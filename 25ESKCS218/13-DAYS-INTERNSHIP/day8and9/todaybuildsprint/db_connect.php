<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "student_registration_db";

// Create Connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check Connection
if (!$conn) {
    die("Database Connection Failed: " . mysqli_connect_error());
}

// Uncomment this line to test the connection
// echo "<div class='alert alert-success'>Database Connected Successfully!</div>";

?>