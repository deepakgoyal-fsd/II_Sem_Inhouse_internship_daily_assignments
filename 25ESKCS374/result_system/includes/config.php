<?php
$host = 'localhost';
$dbname = 'result_system';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getUserRole() {
    return $_SESSION['role'] ?? null;
}

function getStudentId() {
    return $_SESSION['student_id'] ?? null;
}

function redirect($url) {
    header("Location: $url");
    exit();
}

function sanitize($data) {
    return htmlspecialchars(strip_tags($data));
}
?>
