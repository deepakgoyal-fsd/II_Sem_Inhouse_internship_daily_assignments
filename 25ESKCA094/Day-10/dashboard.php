<?php
 include ("header.php");
 session_start();

 echo "Welcome,". $_SESSION['user_name']."!";
?>

<?php
include("footer.php");
?>