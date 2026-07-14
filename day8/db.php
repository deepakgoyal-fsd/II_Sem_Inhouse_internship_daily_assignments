<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "registration";

$conn = mysqli_connect($servername, $username, $password, $database);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}
?>