<?php
session_start();
include ("db.php");
$email=$_POST['email'];
$password=$_POST['password'];
$sql="SELECT * FROM admin WHERE email='$email' AND password='$password'";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    $_SESSION['admin']=$email;
    header("Location: dashboard.php");
    }else{
        echo "<script>
        alert('Invalid Email or Password');
        window.location='login.php';
        </script>";
        }
?>