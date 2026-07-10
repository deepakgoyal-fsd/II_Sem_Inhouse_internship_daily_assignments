<?php
include("db_connect.php");
$error = "";

$old_password = "";
$new_password = "";
$confirm_password = "";

if (!isset($_SESSION['user_id'])) {
    $error = "Please login first.";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = mysqli_real_escape_string($conn, $_POST['old_password'] ?? "");
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password'] ?? "");
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password'] ?? "");

    if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
        $error = "All fields are required.";
    } elseif ($new_password !== $confirm_password) {
        $error = "New password and confirm password do not match.";
    } else {
        $selectQuery = "SELECT * FROM `user` WHERE id = " . (int)$_SESSION['user_id'];
        $result = mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        if ($user && $user['password'] === $old_password) {
            $updateQuery = "UPDATE `user` SET password = '$new_password' WHERE id = " . (int)$_SESSION['user_id'];
            $result = mysqli_query($conn, $updateQuery);

            if ($result) {
                header("Location: updateSuccess.php");
                exit();
            } else {
                $error = "Unable to update password: " . mysqli_error($conn);
            }
        } elseif ($user) {
            $error = "Old password is incorrect.";
        } else {
            $error = "Invalid session. Please login again.";
        }
    }
}
?>