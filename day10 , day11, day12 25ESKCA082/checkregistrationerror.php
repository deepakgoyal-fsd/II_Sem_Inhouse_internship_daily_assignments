<?php
include("DBconnect.php");
$error="";
$name="";
$email="";
$password="";
$confirmpassword="";


if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name=mysqli_real_escape_string($conn, $_POST["name"]);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $confirmpassword=mysqli_real_escape_string($conn,$_POST['confirmpassword']);

    if($name==""|| $email==""|| $password==""|| $confirmpassword=="")
    {
        $error="all fields are required";
        echo $error;
    }
    else if($password!=$confirmpassword)
    {
        $error="password does not match";
        echo $error;
    }
    else{
        $insertQuery="INSERT INTO user (name,email,password) VALUES('$name','$email','$password')";

    $result=mysqli_query($conn,$insertQuery); 
    }
    if($result){
        header("Location:success.php");

    }else{
        echo"error occured while inserting data";
        echo "error:".mysqli_error($conn);
    }
     
     exit();
    }
    ?>
