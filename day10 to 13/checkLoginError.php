<?php
session_start();
$error ="";

$email="";
$password="";
include("db_connect.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password= mysqli_real_escape_string($conn,$_POST["password"]);

    if($email == "" || $password == "" ){
        $error = "All fields are required.";
    echo $error;
    
    }
 else{
    // select
  $selectQuery = "Select * from user where email='$email' and password='$password'";
    $result=mysqli_query($conn,$selectQuery);
    $user = mysqli_fetch_assoc($result);
    if($user){
        // After successful login:
        // session_start();
        $_SESSION['user_id']=$user['id'];
        $_SESSION['user_name']=$user['name'];
        $_SESSION['user_email']=$user['email'];
    
        if($user['role']== 'admin'){
            header(Location: admin/adminDashboard.php);
        }else{
            header("dashboard.php");
            exit();
        }
     header("Location: dashboard.php");
     exit();
    }
    else{
        echo "Invalid Credentials";
        echo "Error:".mysqli_error($conn);
    }
   
}
}
?>