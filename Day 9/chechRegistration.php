<?php
$error = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    if ($name == "" || $email == "" || $password == "" || $confirmPassword == ""){
        $error = "All fields are required";
        echo $error;
    }else{
        header("Location.success.php");
        exit();
    }
} 
?>