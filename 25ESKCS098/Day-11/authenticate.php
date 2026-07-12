<?php

session_start();

include("db_connect.php");

$email=$_POST['email'];

$password=$_POST['password'];

$sql="SELECT * FROM users WHERE email='$email' LIMIT 1";

$result=mysqli_query($conn,$sql);

$user=mysqli_fetch_assoc($result);

if($user && $user['password']==$password){

$_SESSION['user_id']=$user['id'];

$_SESSION['user_name']=$user['name'];

$_SESSION['user_email']=$user['email'];

header("Location: dashboard.php");

exit();

}

else{

header("Location: login.php?error=1");

exit();

}

?>