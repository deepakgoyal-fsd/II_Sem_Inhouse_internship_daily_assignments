<?php

$error="";
$name="";
$email="";
$password="";
$confirmpassword="";

include 'SQLconnect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST['confirmpassword']);


    if ($name == "" || $email == "" || $password == "" || $confirmpassword == "") {
        $error = "All fields are required.";
        echo $error;
    } 
    elseif($password != $confirmpassword){
        $error = "password does not match";
        echo $error;
    }
    else {
        $insertQuery = "Insert into user(name,email,password)
        values('$name','$email','$password')";
        
        $result = mysqli_query($conn,$insertQuery);
        

        if ($result) {
            header("Location: success.php");
            exit();
            
        } else {
            echo "error occured while storing data";
        }
    }
}
?>
