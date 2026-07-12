<?php 
session_star();
$_SESSION=array();
session_destroy();
header("Locaton:login.php");
exit();
?>