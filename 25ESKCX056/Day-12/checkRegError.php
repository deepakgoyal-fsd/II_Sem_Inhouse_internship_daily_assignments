<?php
include('db_connect.php');

 $error = "";

 $name = $email = $password = $confirm_password = "";

if ( $_SERVER["REQUEST_METHOD"] == "POST"){

    $name = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($conn, $_POST["confirm_password"]);

    if ($name == "" || $email == "" || $password == "" || $confirm_password == ""){
        $error = "All fields are required.";
        echo $error;
    } else {
        if ($password !== $confirm_password) {
            $error = "Passwords do not match.";
            echo $error;
        } else {

        $sql = "INSERT INTO `user` (`id`, `username`, `email`, `password`, `time`) VALUES (NULL, '$name', '$email', '$password', current_timestamp())";

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