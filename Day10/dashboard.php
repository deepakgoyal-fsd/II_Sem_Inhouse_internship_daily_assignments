<?php
session_start();
include("header.php");

if (!isset($_SESSION['user_name'])) {
    header("location: login.php");
    exit();
}

include("dashboardVerticalContent.php");
?>

<div class="card p-4">
    <h2 class="mb-2">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>
    <p class="text-muted mb-0">Use the menu on the left to update your profile, edit your skills, or change your password.</p>
</div>

<?php
include("dashboardFooter.php");
include("footer.php");
?>