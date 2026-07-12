<?php
session_start();
include("db-connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($name) || empty($email) || empty($password)) {
        die("All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    // Check if email already exists
    $check = mysqli_prepare($conn, "SELECT id FROM user WHERE email=?");
    mysqli_stmt_bind_param($check, "s", $email);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);

    if (mysqli_stmt_num_rows($check) > 0) {
        echo "<script>
                alert('Email already registered.');
                window.location='registration.php';
              </script>";
        exit();
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = mysqli_prepare($conn,
        "INSERT INTO user(name,email,password) VALUES(?,?,?)");

    mysqli_stmt_bind_param($stmt, "sss",
        $name,
        $email,
        $hashedPassword
    );

    if (mysqli_stmt_execute($stmt)) {

        echo "<script>
                alert('Registration Successful');
                window.location='login.php';
              </script>";

    } else {

        echo "<script>
                alert('Registration Failed');
                window.location='registration.php';
              </script>";

    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>