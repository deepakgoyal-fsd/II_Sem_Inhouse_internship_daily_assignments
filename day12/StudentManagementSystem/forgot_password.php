<?php
require_once 'config/db_connect.php';
$pageTitle = 'Forgot Password';

$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
$email = trim($_POST['email'] ?? '');

require 'includes/guest_header.php';
?>

<div class="card card-soft">
  <div class="card-body p-4 p-md-5">
    <div class="guest-card-icon">
      <i class="fa-solid fa-unlock-keyhole"></i>
    </div>

    <?php if ($submitted && $email !== ''): ?>
      <h3 class="text-center mb-2">Check Your Email</h3>
      <p class="text-center text-muted mb-4">
        If an account exists for <strong><?php echo h($email); ?></strong>, we've sent password
        reset instructions to that address.
      </p>
      <div class="d-grid">
        <a href="login.php" class="btn btn-primary">
          <i class="fa-solid fa-arrow-left me-2"></i>Back to Login
        </a>
      </div>
    <?php else: ?>
      <h3 class="text-center mb-1">Forgot Password?</h3>
      <p class="text-center text-muted mb-4">Enter your email and we'll send you reset instructions.</p>

      <form action="forgot_password.php" method="POST" class="needs-validation" novalidate>
        <div class="mb-3">
          <label for="email" class="form-label">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" required autofocus>
          <div class="invalid-feedback">Please enter your email.</div>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-paper-plane me-2"></i>Send Reset Instructions
          </button>
        </div>
      </form>

      <p class="text-center small mt-4 mb-0">
        <a href="login.php"><i class="fa-solid fa-arrow-left me-1"></i>Back to Login</a>
      </p>
    <?php endif; ?>

  </div>
</div>

<?php require 'includes/guest_footer.php'; ?>
