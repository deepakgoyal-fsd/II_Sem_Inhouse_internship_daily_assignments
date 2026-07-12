<?php
//logout.php
session_start();
//Step 1:Clear all session data
$_SESSION = array(); // Clear all session variables
// Destroy the session
session_destroy(); // Destroy the session
header("Location: login.php"); // Redirect to the login page
exit();
?>