<?php
include("db_connect.php");

$error = "";
$name = "";
$email = "";
$password = "";
$confirmpassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);
    
    if (empty($name) || empty($email) || empty($password) || empty($confirmpassword)) {
        $error = "All fields are required.";
    } elseif ($password !== $confirmpassword) {
        $error = "Passwords do not match.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO info (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
        if (mysqli_query($conn, $sql)) {
            header("Location: success.php");
            exit();
        } else {
            $error = "Database Error: " . mysqli_error($conn);
        }
    }
}
if (!empty($error)) {
    echo $error;
}
?>