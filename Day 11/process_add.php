<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, trim($_POST['name'] ?? ''));
    $email = mysqli_real_escape_string($conn, trim($_POST['email'] ?? ''));
    $branch = mysqli_real_escape_string($conn, trim($_POST['branch'] ?? ''));
    $cgpa = mysqli_real_escape_string($conn, trim($_POST['cgpa'] ?? ''));
    $status = mysqli_real_escape_string($conn, trim($_POST['status'] ?? 'Active'));

    $photo_name = '';
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $photo_name = time() . '_' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . $photo_name);
    }

    $check = mysqli_query($conn, "SELECT id FROM students WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $_SESSION['error'] = "Email address is already in use!";
        header("Location: add.php");
        exit();
    }

    $sql = "INSERT INTO students (name, email, branch, cgpa, photo, status) VALUES ('$name', '$email', '$branch', '$cgpa', '$photo_name', '$status')";
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Student registered successfully!";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['error'] = "Database error: " . mysqli_error($conn);
        header("Location: add.php");
        exit();
    }
}
?>