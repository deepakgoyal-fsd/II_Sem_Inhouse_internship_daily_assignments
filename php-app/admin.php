<?php
require_once __DIR__ . '/db.php';
if (empty($_SESSION['admin'])) { header('Location: login.php'); exit; }
$page = 'Admin';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['delete_id'])) {
    $stmt = $pdo->prepare('DELETE FROM registrations WHERE id = ?');
    $stmt->execute([(int)$_POST['delete_id']]);
    header('Location: admin.php'); exit;
}

$rows = $pdo->query('SELECT * FROM registrations ORDER BY submission_date DESC')->fetchAll();
include __DIR__ . '/header.php';
?>
<section class="py-5">
  <div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h2 class="fw-bold mb-0">Registrations (<?= count($rows) ?>)</h2>
      <span class="badge bg-warning text-dark">Seats left: <?= seatsLeft($pdo) ?></span>
    </div>
    <div class="table-responsive card shadow-sm">
      <table class="table table-striped mb-0 align-middle">
        <thead class="table-dark">
          <tr><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Team</th><th>Date</th><th></th></tr>
        </thead>
        <tbody>
        <?php if (!$rows): ?>
          <tr><td colspan="7" class="text-center text-muted py-4">No registrations yet.</td></tr>
        <?php else: foreach ($rows as $i => $r): ?>
          <tr>
            <td><?= $i + 1 ?></td>
            <td><?= htmlspecialchars($r['full_name']) ?></td>
            <td><?= htmlspecialchars($r['email']) ?></td>
            <td><?= htmlspecialchars($r['phone']) ?></td>
            <td><?= htmlspecialchars($r['team_name']) ?></td>
            <td><?= htmlspecialchars($r['submission_date']) ?></td>
            <td>
              <form method="POST" onsubmit="return confirm('Delete this registration?');">
                <input type="hidden" name="delete_id" value="<?= (int)$r['id'] ?>">
                <button class="btn btn-sm btn-outline-danger">✕</button>
              </form>
            </td>
          </tr>
        <?php endforeach; endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
<?php include __DIR__ . '/footer.php'; ?>
