<?php 
$host = "localhost";
$user = "root";
$password = "php#pa55";
$database = "skit";
$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("connection failed:" . mysqli_connect_error());
}

echo "Connection Successful!";
?>