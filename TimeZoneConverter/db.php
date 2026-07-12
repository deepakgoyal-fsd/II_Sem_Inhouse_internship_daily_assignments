<?php
// =========================================================
// DATABASE CONNECTION FILE
// =========================================================
// This file connects our PHP project to the MySQL database
// using mysqli (as required, no PDO used).
// Every other PHP file will "include" this file to get access
// to the database.
// =========================================================

// Database Connection settings
$db_host = "localhost";      // Server name (default in XAMPP)
$db_user = "root";           // Default XAMPP username
$db_pass = "";                // Default XAMPP password (empty)
$db_name = "timezone_converter"; // Name of our database

// Database Connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check if connection failed
if (!$conn) {
    // Stop the script and show an error message
    die("Database Connection Failed: " . mysqli_connect_error());
}

// (Optional) Set character set to avoid weird symbol issues
mysqli_set_charset($conn, "utf8mb4");
?>
