<?php
session_start();
include("db_connect.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include("dashboardheader.php");
include("dashboardverticalcontent.php");
?>

<h2>Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>

<?php
include("footer.php");
?>