<?php

$host = "localhost";
$user = "Sujal";
$password = "12345";
$database = "industrial_training";

$conn = mysqli_connect($host, $user, $password,$database);

    if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
    }

 echo "Connection Successful! <br>";
?>
