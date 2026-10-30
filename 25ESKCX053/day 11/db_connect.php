<?php
$host = "localhost";
$username = "root";
$password = "8742875893";
$dbname = "skit";

$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully to the database!";
?>