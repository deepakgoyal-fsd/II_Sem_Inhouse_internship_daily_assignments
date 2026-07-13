<?php
session_start();
include("header.php");

if (!isset($_SESSION['user_name'])) {
    header("location: login.php");
    exit();
}

include("dashboardVerticalContent.php");
?>

<h2>Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>

<?php
include("dashboardFooter.php");
include("footer.php");
?>