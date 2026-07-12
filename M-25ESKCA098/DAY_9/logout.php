<?php
// logout.php
session_start();

// step1:clear all session data
$_session=array();

// step2: destroy the sesson
session_destroy();

header("Location: login.php");
exit();
?>