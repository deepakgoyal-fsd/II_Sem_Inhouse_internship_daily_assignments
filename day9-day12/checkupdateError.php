<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $currentPassword = mysqli_real_escape_string($conn, $_POST['currentPassword']);
    $newPassword = mysqli_real_escape_string($conn, $_POST['newPassword']);
    $confirmNewPassword = mysqli_real_escape_string($conn, $_POST['confirmNewPassword']);

    if (empty($currentPassword) || empty($newPassword) || empty($confirmNewPassword)) {

        $_SESSION['error'] = "All fields are required.";
        header("Location: updatepassword.php");
        exit();

    } elseif ($newPassword != $confirmNewPassword) {

        $_SESSION['error'] = "New Password and Confirm New Password do not match.";
        header("Location: updatepassword.php");
        exit();

    } else {

        $userId = $_SESSION['user_id'];

        $selectQuery = "SELECT * FROM user WHERE id='$userId' AND password='$currentPassword'";
        $result = mysqli_query($conn, $selectQuery);

        if (mysqli_num_rows($result) > 0) {

            $updateQuery = "UPDATE user SET password='$newPassword' WHERE id='$userId'";

            if (mysqli_query($conn, $updateQuery)) {
                $_SESSION['success'] = "Password Updated Successfully.";
            } else {
                $_SESSION['error'] = "Password Update Failed.";
            }

        } else {

            $_SESSION['error'] = "Current Password is Incorrect.";

        }

        header("Location: updatepassword.php");
        exit();
    }
}
?>

