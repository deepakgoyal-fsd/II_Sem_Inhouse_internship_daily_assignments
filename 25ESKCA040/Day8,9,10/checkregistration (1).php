<?php

include("db_connect.php");   // Database connection

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if($username == "" || $email == "" || $password == ""){
        echo "All fields are required.";
    }
    else{

        $insertQuery = "INSERT INTO data (username, email, password)
                        VALUES ('$username', '$email', '$password')";

        $result = mysqli_query($conn, $insertQuery);

        if($result){
            header("Location: success2.php");
            exit();
        }
        else{
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>