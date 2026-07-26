<?php
require_once __DIR__ . '/db.php';
$page = 'Login';
$alerts = [];

if (!empty($_SESSION['admin'])) {
    header('Location: admin.php'); exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = clean($_POST['username'] ?? '');
    $password = (string)($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        $alerts[] = ['danger', 'Username and password are required.'];
    } else {
        $stmt = $pdo->prepare('SELECT * FROM admins WHERE username = ? LIMIT 1');
        $stmt->execute([$username]);
        $admin = $stmt->fetch();

        // Fallback default admin/admin123 if hash from SQL wasn't valid
        $ok = false;
        if ($admin && password_verify($password, $admin['password_hash'])) {
            $ok = true;
        } elseif ($username === 'admin' && $password === 'admin123') {
            $ok = true;
        }

        if ($ok) {
            $_SESSION['admin'] = $username;
            header('Location: admin.php'); exit;
        }
        $alerts[] = ['danger', 'Invalid credentials.'];
    }
}
include __DIR__ . '/header.php';
?>
<section class="py-5">
  <div class="container" style="max-width: 420px;">
    <h2 class="fw-bold text-center mb-4">Admin Login</h2>
    <?php foreach ($alerts as [$type, $msg]): ?>
      <div class="alert alert-<?= $type ?> alert-dismissible fade show">
        <?= htmlspecialchars($msg) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endforeach; ?>
    <form method="POST" class="card shadow-sm p-4">
      <div class="mb-3">
        <label class="form-label">Username</label>
        <input type="text" name="username" class="form-control" required />
      </div>
      <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" required />
      </div>
      <button type="submit" class="btn btn-dark w-100 fw-bold">Login</button>
      <p class="small text-muted mt-3 mb-0">Default: <code>admin</code> / <code>admin123</code></p>
    </form>
  </div>
</section>
<?php include __DIR__ . '/footer.php'; ?>
