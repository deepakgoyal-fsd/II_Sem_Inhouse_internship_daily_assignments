<?php
require_once __DIR__ . '/db.php';
$page = 'Register';

$alerts = [];
$left = seatsLeft($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = clean($_POST['full_name'] ?? '');
    $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
    $phone = clean($_POST['phone'] ?? '');
    $team  = clean($_POST['team_name'] ?? '');

    if ($name === '' || $email === '' || $phone === '' || $team === '') {
        $alerts[] = ['danger', 'All fields are required.'];
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $alerts[] = ['danger', 'Please provide a valid email address.'];
    } elseif (!preg_match('/^[0-9+\-\s]{7,20}$/', $phone)) {
        $alerts[] = ['danger', 'Please provide a valid phone number.'];
    } elseif ($left <= 0) {
        $alerts[] = ['warning', 'Sorry, the event is fully booked.'];
    } else {
        try {
            $stmt = $pdo->prepare('INSERT INTO registrations (full_name, email, phone, team_name) VALUES (?, ?, ?, ?)');
            $stmt->execute([$name, $email, $phone, $team]);
            $alerts[] = ['success', '🎉 Registration successful! See you at the hackathon.'];
            $left = seatsLeft($pdo);
        } catch (PDOException $e) {
            if ((int)$e->errorInfo[1] === 1062) {
                $alerts[] = ['warning', 'This email is already registered.'];
            } else {
                $alerts[] = ['danger', 'Something went wrong. Please try again.'];
            }
        }
    }
}

include __DIR__ . '/header.php';
?>
<section class="py-5">
  <div class="container" style="max-width: 640px;">
    <h2 class="fw-bold text-center mb-1">Register for Hackathon 2026</h2>
    <p class="text-center text-muted mb-4">Seats left: <strong><?= $left ?></strong> / <?= SEAT_CAP ?></p>

    <?php foreach ($alerts as [$type, $msg]): ?>
      <div class="alert alert-<?= $type ?> alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($msg) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endforeach; ?>

    <form method="POST" class="card shadow-sm p-4" novalidate>
      <div class="mb-3">
        <label class="form-label">Full Name</label>
        <input type="text" name="full_name" class="form-control" required maxlength="100" />
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required maxlength="150" />
      </div>
      <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="tel" name="phone" class="form-control" required maxlength="20" />
      </div>
      <div class="mb-3">
        <label class="form-label">Team Name</label>
        <input type="text" name="team_name" class="form-control" required maxlength="100" />
      </div>
      <button type="submit" class="btn btn-dark w-100 fw-bold" <?= $left <= 0 ? 'disabled' : '' ?>>
        <?= $left <= 0 ? 'Sold Out' : 'Reserve My Seat' ?>
      </button>
    </form>
  </div>
</section>
<?php include __DIR__ . '/footer.php'; ?>
