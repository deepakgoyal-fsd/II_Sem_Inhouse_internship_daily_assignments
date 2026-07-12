<?php
include ("dashboardHeader.php");
session_start();

echo "Welcome, ". $_SESSION['user_name'] . "!";

?>

<?php
include("footer.php");
?>