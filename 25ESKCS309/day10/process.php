<?php
session_start();
include "common/db_connect.php";

$errors = [];
$_SESSION['old'] = $_POST;

// Validation
if (empty(trim($_POST['name']))) {
    $errors[] = "Name is required";
}

if (empty(trim($_POST['email']))) {
    $errors[] = "Email is required";
} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format";
}

if (empty(trim($_POST['college']))) {
    $errors[] = "College is required";
}

if (empty(trim($_POST['branch']))) {
    $errors[] = "Branch is required";
}

// If error
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: register.php");
    exit;
}

// Insert Data using prepared statements
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$college = trim($_POST['college']);
$branch = trim($_POST['branch']);

$stmt = mysqli_prepare($conn, "INSERT INTO students (name, email, college, branch) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $college, $branch);

if (mysqli_stmt_execute($stmt)) {
    $_SESSION['success'] = "Student registered successfully!";
    unset($_SESSION['old']);
} else {
    $_SESSION['errors'][] = "Database error occurred";
}

mysqli_stmt_close($stmt);
header("Location: register.php");
exit;
