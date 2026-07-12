<?php
include ("dashboardheader.php");
include("dashboardverticalcontant.php");
session_start();


echo "welcome," .$_SESSION['user_name'] . "!";
?>

<a href = "updatepassword.php"> Update Password</a>


<?php
include("dashboardfooter.php");
include ("footer.php");
?>