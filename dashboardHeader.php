<?php
session_start();

if(!isset($_SESSION['user_name'])){
    header("location: login.php");
    exit();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width4=device-width
        <title> My Website </title>