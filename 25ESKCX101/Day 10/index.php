
<?php
require_once 'db_connect.php';
include 'header.php';
?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card p-4">
            <h2 class="mb-3">Welcome !</h2>
            <p class="text-muted">A simple Bootstrap-based user system with login, profile update, password update, and logout.</p>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="dashboard.php" class="btn btn-primary">Go to Dashboard</a>
            <?php else: ?>
                <a href="login.php" class="btn btn-primary me-2">Login</a>
                <a href="register.php" class="btn btn-outline-secondary">Register</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>