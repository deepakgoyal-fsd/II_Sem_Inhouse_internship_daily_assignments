<?php
// Check for registration errors
$error="";
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } else if (empty($name) || empty($email) || empty($password)) {
        $error = "All fields are required.";
    } else {
        $insertQuery = "Insert into user(name,email,password) values('$name','$email','$password')";

        $result = mysqli_query($conn, $insertQuery);
        if (!$result) {
            $error = "Error occurred while registering.";
        } else {
            // Here you would typically insert the user into the database
            header("Location: success.php"); // Redirect to a success page
            exit();
        }
    }
}
?>