<?php
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Fetching user inputs from the form
    $name = $_POST["name"] ?? "";
    $email = $_POST["email"] ?? "";
    $password = $_POST["password"] ?? "";
    $confirmPassword = $_POST["confirmPassword"] ?? "";

    // 2. Checking if any required field is empty
    if ($name == "" || $email == "" || $password == "" || $confirmPassword == "") {
        $error = "All fields are required.";
        echo $error;
    } else {
        // 3. Redirecting safely with exit() to stop further execution
        header("Location: success.php");
        exit();
    }
}
?>