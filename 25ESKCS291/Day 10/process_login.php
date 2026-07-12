<?php
session_start();
include("db_connect.php");
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $query = "SELECT * FROM students WHERE email = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) == 1) {
        $student = mysqli_fetch_assoc($result);
        if (password_verify($password, $student['password'])) {
            $_SESSION['admin'] = $student['name'];
            $_SESSION['admin_id'] = $student['id'];
            header("Location: dashboard.php");
            exit();
        } else {
            header("Location: index.php?error=1");
            exit();
        }
    } else {
        header("Location: index.php?error=1");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>