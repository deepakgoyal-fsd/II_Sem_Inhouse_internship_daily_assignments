<?php
session_start();
include("db_connect.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $oldPassword = mysqli_real_escape_string($conn, $_POST['oldPassword']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    if ($email == "" || $oldPassword == "" || $newPassword == "" || $confirmPassword == "") {
        die("All fields are required.");
    }

    if ($newPassword != $confirmPassword) {
        die("New Password and Confirm Password do not match.");
    }

    // Check old password
    $selectQuery = "SELECT * FROM user WHERE email='$email' AND password='$oldPassword'";
    $result = mysqli_query($conn, $selectQuery);

    if (mysqli_num_rows($result) > 0) {

        // Update Password
        $updateQuery = "UPDATE user SET password='$newPassword' WHERE email='$email'";

        if (mysqli_query($conn, $updateQuery)) {
            echo "Password Updated Successfully.";
        } else {
            echo "Password Update Failed.";
        }

    } else {
        echo "Invalid Email or Old Password.";
    }
}

mysqli_close($conn);
?>