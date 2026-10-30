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

$sqlUsers = "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE,
    password VARCHAR(255) NOT NULL,
    profile_pic VARCHAR(255),
    last_login TIMESTAMP NULL
)";
mysqli_query($conn, $sqlUsers);

$checkAdmin = mysqli_query($conn, "SELECT id FROM users WHERE email='admin@example.com'");
if (mysqli_num_rows($checkAdmin) == 0) {
    mysqli_query($conn, "INSERT INTO users (name, email, password) VALUES ('System Admin', 'admin@example.com', 'password123')");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Setup - Secure Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-white p-5 text-center">
    <div class="container">
        <h1 class="text-success mb-4">Security Layer Ready!</h1>
        <p class="fs-5">The <code>users</code> table has been created with a default admin account.</p>
        <div class="card bg-secondary text-white mx-auto mt-4" style="max-width: 400px;">
            <div class="card-body">
                <p class="mb-1"><strong>Email:</strong> admin@example.com</p>
                <p class="mb-0"><strong>Password:</strong> password123</p>
            </div>
        </div>
        <a href="login.php" class="btn btn-primary btn-lg mt-4">Go to Login</a>
    </div>
</body>

</html>