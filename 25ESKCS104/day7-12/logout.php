<?php
session_start();
$_SESSION = array();

session_destroy();

header("Loaction: login.php");
exit();



?>