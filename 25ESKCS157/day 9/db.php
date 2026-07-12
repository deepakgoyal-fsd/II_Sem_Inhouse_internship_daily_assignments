<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "skit_db";

// Establish handshake connection link to MySQL
$conn = mysqli_connect($host, $user, $password, $dbname);

// Simple conditional check to catch connection errors
if (!$conn) {
    die("Database Connection Error: " . mysqli_connect_error());
}
?>