<?php
session_start();
include("dashboardheader.php");

echo "Welcome, " . $_SESSION['user_name'] . "!";
?>

<?php
include("dashboardverticalcontent.php");
include("footer.php");
?>