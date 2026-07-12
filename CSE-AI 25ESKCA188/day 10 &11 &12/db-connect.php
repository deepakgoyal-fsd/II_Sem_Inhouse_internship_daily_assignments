<?php
$host = "localhost"; 
$user = "projectuser"; 
$password = "12345";
$database = "industrail_training";

// Attempt to connect
$conn = mysqli_connect($host, $user, $password, $database);

// Check connection and output exact error if it fails
if(!$conn){
    die("Database Connection Failed: " . mysqli_connect_error());
}
?>