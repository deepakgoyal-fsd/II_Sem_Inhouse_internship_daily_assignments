<?php

$host     = "localhost";
$user     = "yashteja";
$password = "123457890";
$database = "industrial_training";

$conn= mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

echo "Connection Successful!";
?>
