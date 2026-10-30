<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_NAME', 'registration_db');
define('DB_USER', 'root');
define('DB_PASS', '');

try {
    // 1. First connect to MySQL server (without selecting DB)
    $pdo = new PDO("mysql:host=" . DB_HOST, DB_USER, DB_PASS, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);

    // 2. Create Database if it doesn't exist
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `" . DB_NAME . "`");
    $pdo->exec("USE `" . DB_NAME . "`");

    // 3. Create Users Table if it doesn't exist
    $tableQuery = "
        CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) NOT NULL UNIQUE,
            email VARCHAR(100) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            full_name VARCHAR(100) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            dob DATE NOT NULL,
            bio TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($tableQuery);

} catch (PDOException $e) {
    die("Database Connection Error: " . $e->getMessage());
}
?>