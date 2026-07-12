<?php
include('db_connect.php');

 $error = "";

 $name = $email = $password = $confirm_password = "";

if ( $_SERVER["REQUEST_METHOD"] == "POST"){

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);

    if ($name == "" || $email == "" || $password == "" || $confirmPassword == ""){
        $error = "All fields are required.";
        echo $error;
    } else {
        if ($password !== $confirmPassword) {
            $error = "Passwords do not match.";
            echo $error;
        } else {

        $sql = "INSERT INTO `user` (`id`, `name`, `email`, `password`, `ROLE`,profile_pic) VALUES (NULL, '$name', '$email', '$password', 'ROLE','profile_pic')";

           if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
         } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
         }
           
            header("Location: success.php");
            exit();
        }
    }
}
?>