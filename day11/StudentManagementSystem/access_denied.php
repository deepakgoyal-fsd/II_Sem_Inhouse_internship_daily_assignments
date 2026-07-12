<?php
require_once 'config/db_connect.php';
$pageTitle = 'Access Denied';
require 'includes/guest_header.php';
?>

<div class="card card-soft text-center">
  <div class="card-body p-4 p-md-5">
    <div class="guest-card-icon" style="background-color:#fdecea; color:#dc3545;">
      <i class="fa-solid fa-shield-halved"></i>
    </div>
    <h3 class="mb-2">Access Denied</h3>
    <p class="text-muted mb-4">
      You need to be logged in to view that page. Please sign in to continue.
    </p>
    <a href="login.php" class="btn btn-primary">
      <i class="fa-solid fa-right-to-bracket me-2"></i>Go to Login
    </a>
  </div>
</div>

<?php require 'includes/guest_footer.php'; ?>
