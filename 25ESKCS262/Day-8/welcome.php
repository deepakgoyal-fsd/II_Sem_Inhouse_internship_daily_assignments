<?php
require "header.php";
require "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["user"];
    $mobile = $_POST["mobile"];
    $email = $_POST["email"];
    $pass = password_hash($_POST["pass"],PASSWORD_DEFAULT);


    $sql="INSERT INTO user(username,mobileno,email,password)
VALUES('$user','$mobile','$email','$pass')";
$result=mysqli_query($conn,$sql);
if($result){
    header("Location: login.php");
    exit();

}else{

    die(mysqli_error($conn));

}

} else {
    header("Location: index.php");
    exit();
}


?>