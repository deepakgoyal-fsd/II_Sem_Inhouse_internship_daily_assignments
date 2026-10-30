<?php
$host = "localhost";
$user = "root";
$password = "";

$conn = mysqli_connect($host, $user, $password);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS student_management COLLATE utf8_general_ci");
mysqli_select_db($conn, "student_management");

$sqlTable = "CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE,
    branch VARCHAR(50),
    cgpa DECIMAL(3,2),
    phone VARCHAR(15),
    city VARCHAR(60),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    photo VARCHAR(255),
    address TEXT,
    course VARCHAR(100),
    date_registered TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('Active', 'Inactive') DEFAULT 'Active',
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
mysqli_query($conn, $sqlTable);

mysqli_query($conn, "ALTER TABLE students ADD COLUMN IF NOT EXISTS status ENUM('Active', 'Inactive') DEFAULT 'Active'");
mysqli_query($conn, "ALTER TABLE students ADD COLUMN IF NOT EXISTS updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP");

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Database Setup - CRUD Portal</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white p-5 text-center">
<div class="container">
<h1 class="text-success mb-4">Database Ready for CRUD!</h1>
<p class="fs-5">The <code>student_management</code> database and tables are fully updated with status and updated_at fields.</p>
<a href="index.php" class="btn btn-primary btn-lg mt-3">Go to Dashboard</a>
</div>
</body>
</html>