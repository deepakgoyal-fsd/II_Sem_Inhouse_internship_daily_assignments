<?php
include "../common/db_connect.php";

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$college = trim($_POST['college'] ?? '');
$branch = trim($_POST['branch'] ?? '');

if (empty($name) || empty($email) || empty($college) || empty($branch)) {
    header("Location: add_student.php");
    exit;
}

$stmt = $conn->prepare("INSERT INTO students (name, email, college, branch) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $name, $email, $college, $branch);

if ($stmt->execute()) {
    header("Location: students.php");
} else {
    header("Location: add_student.php");
}
$stmt->close();
exit;
