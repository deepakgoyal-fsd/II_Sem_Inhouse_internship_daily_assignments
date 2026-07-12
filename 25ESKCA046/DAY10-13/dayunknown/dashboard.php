<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("dashboardHeader.php");
include("dashboardOptions.php");
?>

<div class="card shadow-sm border-0 bg-light">
    <div class="card-body p-5 text-center">
        <h2 class="text-primary mb-3">
            <?php echo "Welcome, " . htmlspecialchars($_SESSION['user_name']) . "!"; ?>
        </h2>
        <p class="lead text-muted">Select an option from the menu on the left to manage your account.</p>
    </div>
</div>

<?php
include("dashboardfooter.php");
include("footer.php");
?>