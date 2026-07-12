<?php
// db_connect.php

// Database connection details
$servername = "localhost";
$username = "root";      // default username for XAMPP
$password = "";          // leave blank if no password set
$dbname = "industrial_training";     // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connection successful";

?>