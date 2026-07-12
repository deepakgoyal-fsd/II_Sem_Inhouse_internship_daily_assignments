<?php

// Connect to MySQL without selecting a database
$conn = mysqli_connect("localhost", "root", "");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS student_portal";

if (mysqli_query($conn, $sql)) {
    echo "Database 'student_portal' created successfully or already exists.<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
    exit;
}

// Select the database
mysqli_select_db($conn, "student_portal");

// Create students table
$createTableSQL = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    college VARCHAR(100) NOT NULL,
    branch VARCHAR(100) NOT NULL,
    cgpa DECIMAL(3, 2) NOT NULL,
    grade VARCHAR(2) NOT NULL
)";

if (mysqli_query($conn, $createTableSQL)) {
    echo "Table 'students' created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn) . "<br>";
    exit;
}

echo "✓ Setup completed successfully! Your database and tables are ready to use.";

mysqli_close($conn);

?>