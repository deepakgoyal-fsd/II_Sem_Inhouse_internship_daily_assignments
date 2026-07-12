<?php
session_start();
include "common/db_connect.php";

$errors = [];

if (empty(trim($_POST['name']))) {
    $errors[] = "Name is required";
}

if (empty(trim($_POST['email']))) {
    $errors[] = "Email is required";
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: index.php#contact");
    exit;
}

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$mobile = trim($_POST['mobile'] ?? '');
$college = trim($_POST['college'] ?? '');
$class_semester = trim($_POST['class_semester'] ?? '');
$city = trim($_POST['city'] ?? '');
$queries = trim($_POST['queries'] ?? '');

$stmt = mysqli_prepare($conn, "INSERT INTO contacts (name, email, mobile, college, class_semester, city, queries) VALUES (?, ?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sssssss", $name, $email, $mobile, $college, $class_semester, $city, $queries);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['success'] = "Message sent successfully!";
} else {
    $_SESSION['errors'][] = "Database error occurred";
}

mysqli_stmt_close($stmt);
header("Location: index.php#contact");
exit;
