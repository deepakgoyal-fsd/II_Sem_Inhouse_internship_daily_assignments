<?php

$email=$_POST['email'];
$password=$_POST['password'];

$query="select * from admin where email = '$email' and password = '$password'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);

if(cout($row!==0){
    $_SESSION['admin']=$row;
    $_SESSION['is_loggedin']=true;
    header('location:students.php');
    exit;
}else{
    header('location:index.php');
    exit;
})