<?php
/*
    Database Configuration File
    ----------------------------
    Change these values to match your own MySQL setup.
    Default values below work with XAMPP / WAMP out of the box.
*/

$host    = "localhost";   // database server
$db_user = "root";        // database username
$db_pass = "";             // database password
$db_name = "todo_db";      // database name

// Create a connection to MySQL using mysqli (procedural style)
$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

// If connection fails, stop the script and show an error
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Set character set to avoid encoding issues
mysqli_set_charset($conn, "utf8mb4");
?>
