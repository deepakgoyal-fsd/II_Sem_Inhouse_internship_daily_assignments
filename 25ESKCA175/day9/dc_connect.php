<?php
$host = "localhost";
$user = "root";
$password = "harshit@jain";
$database = "skit";

$conn = mysqli_connect($host, $user, $password,
$database);
if (!$conn) {
die("Connection Failed: " . mysqli_connect_error());
}

echo "Connection Successful!";

?>