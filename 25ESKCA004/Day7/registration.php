<?php

include("db_connect.php");

$fullname=$_POST['fullname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$password=$_POST['password'];
$confirm=$_POST['confirmPassword'];

if($password!=$confirm){

echo "Password does not match";

exit();

}

$hashedPassword=password_hash($password,PASSWORD_DEFAULT);

$sql="INSERT INTO users(fullname,email,phone,password)
VALUES('$fullname','$email','$phone','$hashedPassword')";

if(mysqli_query($conn,$sql)){

header("Location: success.php");

}
else{

echo "Error : ".mysqli_error($conn);

}

?>