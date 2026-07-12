<?php

session_start();
include("db.php");

if(!isset($_SESSION['id']))
{
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

mysqli_query($conn,"DELETE FROM user WHERE id='$id'");

header("Location: superadmindashboard.php");
exit();

?>