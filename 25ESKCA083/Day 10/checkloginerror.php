<?php
session_start();
include("db_connect.php");
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        $error = "All Fields are required.";
    } else {
        $selectQuery = "SELECT * FROM info WHERE email='$email'";
        $result = mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_id'] = $user['id'];

            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid Credentials"; 
        }
    }
}