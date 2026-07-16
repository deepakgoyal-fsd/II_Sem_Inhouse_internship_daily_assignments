<?php
include_once("db_connect.php");

$error = "";
$name = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name            = trim($_POST["name"] ?? "");
    $email           = trim($_POST["email"] ?? "");
    $password        = $_POST["password"] ?? "";
    $confirmPassword = $_POST["confirmPassword"] ?? "";

    if ($name == "" || $email == "" || $password == "" || $confirmPassword == "") {
        $error = "All fields are required.";
    } elseif ($password != $confirmPassword) {
        $error = "Passwords do not match.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        // Check if email already exists
        $checkQuery = "SELECT id FROM user WHERE email = ?";
        $checkStmt = mysqli_prepare($conn, $checkQuery);
        mysqli_stmt_bind_param($checkStmt, "s", $email);
        mysqli_stmt_execute($checkStmt);
        $checkResult = mysqli_stmt_get_result($checkStmt);

        if (mysqli_num_rows($checkResult) > 0) {
            $error = "Email is already registered.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $insertQuery = "INSERT INTO user (name, email, password, skills) VALUES (?, ?, ?, '')";
            $insertStmt = mysqli_prepare($conn, $insertQuery);
            mysqli_stmt_bind_param($insertStmt, "sss", $name, $email, $hashedPassword);
            $result = mysqli_stmt_execute($insertStmt);

            if ($result) {
                header("Location: login.php");
                exit();
            } else {
                $error = "Error occurred while storing data.";
            }
        }
    }
}
?>