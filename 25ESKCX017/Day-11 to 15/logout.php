<?php
//logout.php
session_start();
//step1 
$SESSION = array();
session_destroy();
header("Location: login.php");
exit();
?>