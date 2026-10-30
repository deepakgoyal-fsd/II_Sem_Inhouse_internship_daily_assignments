<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $name = mysqli_real_escape_string($conn, trim($_POST['name'] ?? ''));
    $email = mysqli_real_escape_string($conn, trim($_POST['email'] ?? ''));
    $branch = mysqli_real_escape_string($conn, trim($_POST['branch'] ?? ''));
    $cgpa = mysqli_real_escape_string($conn, trim($_POST['cgpa'] ?? ''));
    $status = mysqli_real_escape_string($conn, trim($_POST['status'] ?? 'Active'));

    $check = mysqli_query($conn, "SELECT id FROM students WHERE email='$email' AND id != $id");
    if (mysqli_num_rows($check) > 0) {
        $_SESSION['error'] = "Email address is already used by another student!";
        header("Location: edit.php?id=$id");
        exit();
    }

    $photo_sql = "";
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
        $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
        $photo_name = time() . '_' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], 'uploads/' . $photo_name);
        $photo_sql = ", photo='$photo_name'";
    }

    $sql = "UPDATE students SET name='$name', email='$email', branch='$branch', cgpa='$cgpa', status='$status' $photo_sql WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        $_SESSION['success'] = "Record updated successfully for " . htmlspecialchars($name) . "!";
    } else {
        $_SESSION['error'] = "Database error: " . mysqli_error($conn);
    }
}
header("Location: index.php");
exit();
?>