<?php
// logout.php
session_start();
// Step 1: Clear all session data
$_SESSION = array();

// Step 2: Destroy the session
session_destroy();

// Step 3: Set user back to login page
header("Location: login.php");
exit();
?>