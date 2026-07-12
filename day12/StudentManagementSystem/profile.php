<?php
require_once 'includes/require_login.php';
require_once 'config/db_connect.php';
$pageTitle = 'My Profile';

$status = $_GET['status_msg'] ?? '';

$stmt = mysqli_prepare($conn, 'SELECT * FROM users WHERE id = ?');
mysqli_stmt_bind_param($stmt, 'i', $_SESSION['user_id']);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

require 'includes/header.php';
?>

<?php if ($status === 'updated'): ?>
  <div class="alert alert-success alert-dismissible fade show" id="successAlert" role="alert">
    <i class="fa-solid fa-circle-check me-2"></i><strong>Profile updated successfully.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php elseif ($status === 'error'): ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-exclamation me-2"></i><strong>Something went wrong.</strong> Please try again.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<div class="row justify-content-center mt-3">
  <div class="col-lg-7">
    <div class="card card-soft">
      <div class="card-body p-4 p-md-5">
        <h4 class="mb-4"><i class="fa-solid fa-id-badge me-2 text-primary"></i>My Profile</h4>

        <form action="update_profile.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

          <div class="d-flex align-items-center mb-4 gap-3">
            <div class="text-center">
              <?php if (!empty($user['profile_picture']) && file_exists('assets/uploads/' . $user['profile_picture'])): ?>
                <img id="photoPreview" src="assets/uploads/<?php echo h($user['profile_picture']); ?>" class="avatar-lg mb-1" alt="Profile picture">
                <i class="fa-solid fa-camera d-none" id="photoPlaceholderIcon"></i>
              <?php else: ?>
                <div class="avatar-lg-placeholder mb-1" id="photoPlaceholderIcon"><i class="fa-solid fa-user"></i></div>
                <img id="photoPreview" src="#" alt="Preview" class="d-none avatar-lg">
              <?php endif; ?>
            </div>
            <div class="flex-grow-1">
              <label for="photo" class="form-label fw-semibold mb-1">Profile Picture</label>
              <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
              <div class="form-text">Shown in the sidebar and on this page.</div>
            </div>
          </div>

          <div class="mb-3">
            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" required value="<?php echo h($user['name']); ?>">
            <div class="invalid-feedback">Please enter your name.</div>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required value="<?php echo h($user['email']); ?>">
            <div class="invalid-feedback">Please enter a valid email.</div>
          </div>

          <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-primary">
              <i class="fa-solid fa-floppy-disk me-2"></i>Save Changes
            </button>
            <a href="change_password.php" class="btn btn-outline-secondary">
              <i class="fa-solid fa-key me-2"></i>Change Password
            </a>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php require 'includes/footer.php'; ?>
