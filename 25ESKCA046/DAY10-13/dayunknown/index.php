<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['user_name'])) {
    include("dashboardHeader.php");
} else {
    include("header.php");
}
?>

<div class="container mt-5 mb-5">
    <div class="p-5 text-center bg-white rounded-3 shadow-sm border-0">
        <h1 class="mb-3 text-primary fw-bold">Welcome to Our Platform</h1>
        <p class="lead text-muted mb-4">A simple and students-friendly education system.</p>
        
        <?php if (!isset($_SESSION['user_name'])): ?>
            <a href="login.php" class="btn btn-primary btn-lg mt-2 px-4">Login Now</a>
            <a href="registeration.php" class="btn btn-outline-secondary btn-lg mt-2 px-4 ms-2">Register</a>
        <?php else: ?>
            <a href="dashboard.php" class="btn btn-primary btn-lg mt-2 px-4">Go to My Dashboard</a>
        <?php endif; ?>
    </div>
</div>

<?php include("footer.php"); ?>