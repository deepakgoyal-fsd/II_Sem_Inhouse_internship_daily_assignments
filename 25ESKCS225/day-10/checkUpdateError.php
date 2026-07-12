<?php
$error ="";
$newpassword="";
$confirmpassword= "";
$oldpassword= "";
include("dbconnect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //die("i AM HERE");
    $newpassword = mysqli_real_escape_string($conn,$_POST["newpassword"]);
    $confirmpassword = mysqli_real_escape_string($conn,$_POST["confirmpassword"]);
    $oldpassword = mysqli_real_escape_string($conn,$_POST["oldpassword"]);

    if($newpassword == "" || $confirmpassword == "" || $oldpassword == "" ){
        $error = "All fields are required.";
    echo $error;
    }elseif($newpassword != $confirmpassword){
        $error = "Password does not match";
        echo $error; 
    }
    else{
        // select
        $selectQuery ="Select * from user where id=".$_SESSION['user_id'];
        $result=mysqli_query($conn,$selectQuery);
        $user = mysqli_fetch_assoc($result);
        if($user && $user['password'] == $oldpassword){
            $updateQuery = "Update user set password='$newpassword' where id=".$_SESSION['user_id'];
            // after successfull login:
            session_start();

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
        header("Location: dashboard.php");
        exit();
        }elseif($user){
            echo "Old password is incorrect";
            exit();
        }
        
        else{
            echo "Invalid Credentials";
            echo "Error:".mysqli_error($conn);
        }
    }
}
?>