<?php
session_start();
include "common/db_connect.php";

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$mobile = trim($_POST['mobile'] ?? '');
$college = trim($_POST['college'] ?? '');
$class = trim($_POST['class'] ?? '');
$city = trim($_POST['city'] ?? '');
$query_text = trim($_POST['query'] ?? '');

if (empty($name) || empty($email) || empty($mobile)) {
    $_SESSION['contact_error'] = "Name, Email and Mobile are required.";
    header("Location: index.php#contact");
    exit;
}

$stmt = $conn->prepare("INSERT INTO contacts (name, email, mobile, college, class_semester, city, query_text) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $name, $email, $mobile, $college, $class, $city, $query_text);

if ($stmt->execute()) {
    $_SESSION['contact_success'] = "Thank you! We will get back to you soon.";
} else {
    $_SESSION['contact_error'] = "Something went wrong. Please try again.";
}
$stmt->close();

header("Location: index.php#contact");
exit;
