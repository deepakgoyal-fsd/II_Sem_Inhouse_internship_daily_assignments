<?php session_start();
//session_destroy();
unset($_SESSION['is_loggedin']);
unset($_SESSION['username']);
header("Location: login.php");