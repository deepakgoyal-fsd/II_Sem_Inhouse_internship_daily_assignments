<?php
require_once 'config/db_connect.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If already logged in, skip straight to the dashboard
if (!empty($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}

$pageTitle = 'Login';
$loginError = $_SESSION['login_error'] ?? '';
$loggedOut  = isset($_GET['loggedout']);
unset($_SESSION['login_error']);

require 'includes/guest_header.php';
?>

<div class="card card-soft">
  <div class="card-body p-4 p-md-5">
    <div class="guest-card-icon">
      <i class="fa-solid fa-lock"></i>
    </div>
    <h3 class="text-center mb-1">Welcome Back</h3>
    <p class="text-center text-muted mb-4">Sign in to manage your students</p>

    <?php if ($loggedOut): ?>
      <div class="alert alert-info">
        <i class="fa-solid fa-circle-info me-2"></i>You've been logged out.
      </div>
    <?php endif; ?>

    <?php if ($loginError): ?>
      <div class="alert alert-danger">
        <i class="fa-solid fa-circle-exclamation me-2"></i><?php echo h($loginError); ?>
      </div>
    <?php endif; ?>

    <form action="authenticate.php" method="POST" class="needs-validation" novalidate>
      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="email" name="email" required autofocus>
        <div class="invalid-feedback">Please enter your email.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
        <div class="invalid-feedback">Please enter your password.</div>
      </div>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="forgot_password.php" class="small">Forgot password?</a>
      </div>
      <div class="d-grid">
        <button type="submit" class="btn btn-primary">
          <i class="fa-solid fa-right-to-bracket me-2"></i>Log In
        </button>
      </div>
    </form>

    <p class="text-center text-muted small mt-4 mb-0">
      Demo login &mdash; admin@example.com / password123
    </p>
  </div>
</div>

<?php require 'includes/guest_footer.php'; ?>
