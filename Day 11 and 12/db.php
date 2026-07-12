<?php
// Database Connection

$servername = "localhost";
$username = "root";
$password = "";
$database = "student_management";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check Connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Set Character Encoding
mysqli_set_charset($conn, "utf8");
?>