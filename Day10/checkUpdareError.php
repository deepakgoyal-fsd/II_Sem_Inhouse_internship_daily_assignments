<?php
include_once("db_connect.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newpassword     = $_POST["newpassword"] ?? "";
    $confirmpassword = $_POST["confirmpassword"] ?? "";
    $oldpassword     = $_POST["oldpassword"] ?? "";
    $userId          = $_SESSION['user_id'];

    if ($newpassword == "" || $oldpassword == "" || $confirmpassword == "") {
        $error = "All fields are required.";
    } elseif ($newpassword != $confirmpassword) {
        $error = "New password and confirm password do not match.";
    } elseif (strlen($newpassword) < 6) {
        $error = "New password must be at least 6 characters.";
    } else {
        $selectQuery = "SELECT * FROM user WHERE id = ?";
        $stmt = mysqli_prepare($conn, $selectQuery);
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($oldpassword, $user["password"])) {
            $hashedPassword = password_hash($newpassword, PASSWORD_DEFAULT);
            $updateQuery = "UPDATE user SET password = ? WHERE id = ?";
            $updateStmt = mysqli_prepare($conn, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "si", $hashedPassword, $userId);
            mysqli_stmt_execute($updateStmt);
            $error = "Password updated successfully!";
        } elseif ($user) {
            $error = "Old password is incorrect.";
        } else {
            $error = "Invalid credentials.";
        }
    }
}
?>