<?php

$error = "";

$name="";
$email="";
$password="";
$confirmPassword="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name =mysqli_real_escape_string($conn,$_POST["name"]);
    $email =mysqli_real_escape_string($conn, $_POST["email"]);
    $password =mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmpassword =mysqli_real_escape_string($conn, $_POST["confirmpassword"]);

    if($name == "" || $email =="" || $password =="" || $confirmPassword =="") {
        $error=="All fields are required.";
        echo $error;
    }
}
elseif($password!=$confirmpassword){
    $error="password does not match.";
echo $error;
    }
    else{

        header("location: success.php");
        exit();
    }


?>