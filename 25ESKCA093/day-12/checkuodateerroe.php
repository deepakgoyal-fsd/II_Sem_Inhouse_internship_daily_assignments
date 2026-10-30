<?php
session_start();
include("db_connect.php");
$error="";

$newPassword = "";
$confirmPassword = "";
$oldPassword="";

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $oldPassword=mysqli_real_escape_string($conn,$_POST["oldPassword"]);
    $newPassword=mysqli_real_escape_string($conn,$_POST["newPassword"]);
    $confirmPassword=mysqli_real_escape_string($conn,$_POST["confirmPassword"]);


    if($newPassword==""||$oldPassword==""){
        $error="All fields are required.";
    }
    elseif($newPassword!=$confirmPassword){
        $error="New Password and Confirm Password do not match.";
    }
    else
    {
        $userId=$_SESSION["user_id"];
        $selectQuery="SELECT * FROM user WHERE id='$userId'";
        $result=mysqli_query($conn,$selectQuery);
        $user=mysqli_fetch_assoc($result);

        if($user && $user["password"]==$oldPassword)
        {
            $updateQuery="UPDATE user SET password='$newPassword' WHERE id='$userId'";
           if(mysqli_query($conn,$updateQuery))
           {
            header("Location: login.php");
            exit();
        }
        else{
            $error="Error updating password.";
    }
        }
else
{
    $error="Old password is incorrect.";
}
    }
}
?>