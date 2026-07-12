<?php
 include ("dashboardheader.php");
 session_start();
echo "Welcome " .$_SESSION['user_name']."!";
?>

<a href="updatepassword.php">Update Password</a>

<?php
include("footer.php");
?>