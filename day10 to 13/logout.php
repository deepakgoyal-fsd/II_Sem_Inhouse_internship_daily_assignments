<?php
// logout.php
session_start();
//Step 1: Clear the session data
$_SESSION = array();
//Step 2: Destroy The Session
session_destroy();
//Step 3:Send user back to login
header("Location: login.php");
exit();
?>