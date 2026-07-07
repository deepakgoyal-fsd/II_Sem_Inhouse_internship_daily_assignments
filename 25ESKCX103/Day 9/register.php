<?php

include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validation
    if (empty($fullname) || empty($email) || empty($username) || empty($password) || empty($confirmPassword)) {
        die("All fields are required.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    if ($password != $confirmPassword) {
        die("Passwords do not match.");
    }

    // Check existing user
    $check = mysqli_prepare($conn, "SELECT id FROM users WHERE email=? OR username=?");
    mysqli_stmt_bind_param($check, "ss", $email, $username);
    mysqli_stmt_execute($check);
    mysqli_stmt_store_result($check);

    if (mysqli_stmt_num_rows($check) > 0) {
        die("Email or Username already exists.");
    }

    mysqli_stmt_close($check);

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $insert = mysqli_prepare($conn, "INSERT INTO users(fullname,email,username,password) VALUES(?,?,?,?)");
    mysqli_stmt_bind_param($insert, "ssss", $fullname, $email, $username, $hashedPassword);

    if (mysqli_stmt_execute($insert)) {
        echo "<h2 style='color:green;text-align:center;'>Registration Successful!</h2>";
        echo "<p style='text-align:center;'><a href='index.html'>Go Back</a></p>";
    } else {
        echo "Registration Failed.";
    }

    mysqli_stmt_close($insert);
    mysqli_close($conn);
}
?>