<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "student_portal2";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check Connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

?>