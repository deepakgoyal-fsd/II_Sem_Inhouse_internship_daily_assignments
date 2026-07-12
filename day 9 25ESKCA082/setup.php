<?php

$databaseName = "student_portal";

// Connect to MySQL without selecting a database
$conn = mysqli_connect("localhost", "admin", "Rohit@45");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS {$databaseName}";

if (mysqli_query($conn, $sql)) {
    echo "Database '{$databaseName}' created successfully or already exists.<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
    exit;
}

// Select the database
mysqli_select_db($conn, $databaseName);

// Create students table
$createTableSQL = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    college VARCHAR(100) NOT NULL,
    branch VARCHAR(100) NOT NULL,
    cgpa DECIMAL(3, 2) NOT NULL,
    grade VARCHAR(2) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL
)";

if (mysqli_query($conn, $createTableSQL)) {
    echo "Table 'students' created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
    exit;
}

$alterPhoneSQL = "ALTER TABLE students ADD COLUMN phone VARCHAR(20) NOT NULL";
if (!mysqli_query($conn, $alterPhoneSQL) && mysqli_errno($conn) !== 1060) {
    echo "Error updating phone column: " . mysqli_error($conn) . "<br>";
    exit;
}

$alterAddressSQL = "ALTER TABLE students ADD COLUMN address TEXT NOT NULL";
if (!mysqli_query($conn, $alterAddressSQL) && mysqli_errno($conn) !== 1060) {
    echo "Error updating address column: " . mysqli_error($conn) . "<br>";
    exit;
}

echo "✓ Setup completed successfully! Your database and tables are ready to use.";

mysqli_close($conn);

?>
