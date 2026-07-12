<?php
$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    include 'db_connect.php';

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn,$_POST['confirmpassword']);

    if($name=="" || $email=="" || $password=="" || $confirmpassword==""){
        echo "All fields are required.";
    }
    elseif($password != $confirmpassword){
        echo "Passwords do not match.";
    }
    else{

        $insertQuery = "INSERT INTO user(name,email,password)
                        VALUES('$name','$email','$password')";

        $result = mysqli_query($conn,$insertQuery);

        if($result){
            header("Location: success.php");
            exit();
        }
        else{
            echo "Error occurred while submitting data.<br>";
            echo mysqli_error($conn);
        }
    }
}
?>