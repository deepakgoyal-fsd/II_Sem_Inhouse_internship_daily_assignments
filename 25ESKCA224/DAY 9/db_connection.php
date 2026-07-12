<?php

$servername = "localhost";
$username = "harsh";
$password = "12345";
$database = "college";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>