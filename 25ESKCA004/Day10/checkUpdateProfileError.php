<?php
include_once("db_connect.php");

$error  = "";
$userId = $_SESSION['user_id'];

// Load current values so the form is pre-filled
$selectQuery = "SELECT * FROM user WHERE id = ?";
$stmt = mysqli_prepare($conn, $selectQuery);
mysqli_stmt_bind_param($stmt, "i", $userId);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$currentUser = mysqli_fetch_assoc($result);

$name   = $currentUser['name'] ?? "";
$skills = $currentUser['skills'] ?? "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name   = trim($_POST["name"] ?? "");
    $skills = trim($_POST["hobbies"] ?? ""); // form field is still named "hobbies"

    if ($name == "") {
        $error = "Name is required.";
    } else {
        $updateQuery = "UPDATE user SET name = ?, skills = ? WHERE id = ?";
        $updateStmt = mysqli_prepare($conn, $updateQuery);
        mysqli_stmt_bind_param($updateStmt, "ssi", $name, $skills, $userId);
        $result = mysqli_stmt_execute($updateStmt);

        if ($result) {
            $_SESSION['user_name'] = $name;
            $error = "Profile updated successfully!";
        } else {
            $error = "Error updating profile.";
        }
    }
}
?>