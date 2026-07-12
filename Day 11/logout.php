<?php
//logout.php
session_start();

//Step1: Clear all session data
$_SESSION = array();

//Step2: Destroy the session
session_destroy();

//step3: Send user back to login
header("Location: login.php");
exit();
?>
