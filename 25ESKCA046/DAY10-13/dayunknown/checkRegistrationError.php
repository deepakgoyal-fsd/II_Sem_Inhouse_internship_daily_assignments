<?php
include("db_connect.php");
$error = "";
$name = "";
$email ="";
$password ="";
$confirmPassword ="";
$role = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);
    
    if(isset($_POST["role"])){
        $role = mysqli_real_escape_string($conn, $_POST["role"]);
    }

    if ($name == "" || $email == "" || $password == "" || $confirmPassword == "" || $role == ""){
        $error = "All fields are required.";
    } elseif($password != $confirmPassword){
        $error = "Passwords do not match.";
    } else {
        $checkEmailQuery = "SELECT * FROM user WHERE email = '$email'";
        $checkResult = mysqli_query($conn, $checkEmailQuery);
             
        if (mysqli_num_rows($checkResult) > 0) {
            $error = "An account with this email address already exists.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            
            $insertQuery = "INSERT INTO user(name, email, password, role) VALUES('$name','$email', '$hashedPassword', '$role')";
            
            $result = mysqli_query($conn, $insertQuery);
            if($result){
                header("Location: success.php");
                exit();
            } else {
                $error = "Error occurred: " . mysqli_error($conn);
            }
        }
    }
}
?>