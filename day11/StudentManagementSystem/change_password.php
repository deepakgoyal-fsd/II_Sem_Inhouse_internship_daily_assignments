<?php
require_once 'includes/require_login.php';
require_once 'config/db_connect.php';
$pageTitle = 'Change Password';

$status = $_GET['status_msg'] ?? '';

require 'includes/header.php';
?>

<?php if ($status === 'updated'): ?>
  <div class="alert alert-success alert-dismissible fade show" id="successAlert" role="alert">
    <i class="fa-solid fa-circle-check me-2"></i><strong>Password changed successfully.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php elseif ($status === 'wrong_current'): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation me-2"></i>Your current password is incorrect.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php elseif ($status === 'mismatch'): ?>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-triangle-exclamation me-2"></i>New password and confirmation don't match.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php elseif ($status === 'error'): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation me-2"></i>Something went wrong. Please try again.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<div class="row justify-content-center mt-3">
  <div class="col-lg-6">
    <div class="card card-soft">
      <div class="card-body p-4 p-md-5">
        <h4 class="mb-4"><i class="fa-solid fa-key me-2 text-primary"></i>Change Password</h4>

        <form action="do_change_password.php" method="POST" class="needs-validation" novalidate>
          <div class="mb-3">
            <label for="current_password" class="form-label">Current Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="current_password" name="current_password" required>
          </div>
          <div class="mb-3">
            <label for="new_password" class="form-label">New Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="new_password" name="new_password" minlength="8" required>
            <div class="form-text">At least 8 characters.</div>
          </div>
          <div class="mb-3">
            <label for="confirm_password" class="form-label">Confirm New Password <span class="text-danger">*</span></label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" minlength="8" required>
          </div>
          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary">
              <i class="fa-solid fa-floppy-disk me-2"></i>Update Password
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php require 'includes/footer.php'; ?>
