<?php
$servername = "localhost";
$username = "root";
$password = "yt@12gourav";
$dbname = "skit";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>