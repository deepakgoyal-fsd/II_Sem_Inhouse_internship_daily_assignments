<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-3 mb-4">
            <div class="card p-3">
                <h6 class="text-uppercase text-muted small mb-3">Account</h6>
                <a href="dashboard.php" class="sidebar-link <?php echo $currentPage === 'dashboard.php' ? 'active' : ''; ?>">
                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                </a>
                <a href="updateProfile.php" class="sidebar-link <?php echo $currentPage === 'updateProfile.php' ? 'active' : ''; ?>">
                    <i class="bi bi-person-lines-fill me-2"></i> Update Profile
                </a>
                <a href="updatePassword.php" class="sidebar-link <?php echo $currentPage === 'updatePassword.php' ? 'active' : ''; ?>">
                    <i class="bi bi-shield-lock me-2"></i> Update Password
                </a>
            </div>
        </div>

        <div class="col-md-9">