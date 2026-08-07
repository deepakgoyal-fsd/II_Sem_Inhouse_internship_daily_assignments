<?php
$host = "localhost";
$user = "root";
$pass = ""; // Default XAMPP MySQL password
$dbName = "hostel_db";

$conn = new mysqli($host, $user, $pass, $dbName);

if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}
?>
