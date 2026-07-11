<?php
$host     = "localhost";
$user     = "root";
$password = "password";
$database = "internship";

$conn= mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}       
?>
