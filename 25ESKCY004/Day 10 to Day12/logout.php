<?php
// logout.php
session_start();
//clear all session data
$_SESSION = array();
// destroy the session
session_destroy();

header("Location: login.php");
exit();
?>