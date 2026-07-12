<?php
session_start();

$_SESSIOn = array();

session_destroy();
 header("location: login.php");
 exit();
 ?>