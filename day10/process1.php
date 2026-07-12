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
    header("Location: register1.php");
    exit;
}

// Insert Data
$name = $_POST['name'];
$email = $_POST['email'];
$college = $_POST['college'];
$branch = $_POST['branch'];

$stmt = $conn->prepare("INSERT INTO students (name, email, college, branch) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $college, $branch);

if ($stmt->execute()) {
    $_SESSION['success'] = "Student registered successfully!";
    unset($_SESSION['old']);
} else {
    $_SESSION['errors'][] = "Database error occurred";
}
$stmt->close();

header("Location: register1.php");
exit;
