<?php
session_start();
include ("dashboardheader.php");

echo "Welcome, " . $_SESSION['user_name'] . "!";

?>
<a href="updatePassword.php">Update Password</a>
<?php
include("footer.php");
?>