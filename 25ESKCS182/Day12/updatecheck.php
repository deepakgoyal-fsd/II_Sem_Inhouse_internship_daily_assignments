<?php
session_start();
include('db_connect.php');

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = mysqli_real_escape_string($conn, trim($_POST["new_password"] ?? ""));
    $old_password = mysqli_real_escape_string($conn, trim($_POST["oldpassword"] ?? ""));
    $confirm_password = mysqli_real_escape_string($conn, trim($_POST["confirm_password"] ?? ""));

    if ($new_password === "" || $old_password === "" || $confirm_password === "") {
        $error = "Please fill in all fields.";
        echo $error;
    } elseif ($new_password !== $confirm_password) {
        $error = "New password and confirm password do not match.";
        echo $error;
    } elseif (!isset($_SESSION["user_id"])) {
        echo "Please login first.";
    } else {
        $user_id = (int)$_SESSION["user_id"];
        $selectQuery = "SELECT password FROM user WHERE id = $user_id";
        $result = mysqli_query($conn, $selectQuery);

        if ($result && $user = mysqli_fetch_assoc($result)) {
            $stored_password = $user["password"];

            if ($stored_password === $old_password || password_verify($old_password, $stored_password)) {
                $safe_new_password = mysqli_real_escape_string($conn, $new_password);
                $updateQuery = "UPDATE user SET password = '$safe_new_password' WHERE id = $user_id";

                if (mysqli_query($conn, $updateQuery)) {
                    header("Location: dashboard.php");
                    exit();
                } else {
                    echo "Failed to update password.";
                }
            } else {
                echo "Old password is incorrect.";
            }
        } else {
            echo "User not found.";
        }
    }
}
