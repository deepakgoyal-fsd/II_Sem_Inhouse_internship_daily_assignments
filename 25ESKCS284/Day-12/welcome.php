<?php
require "header.php";
require "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $user = trim($_POST["user"]);
$mobile = trim($_POST["mobile"]);
$email = trim($_POST["email"]);
$rawPass = trim($_POST["pass"]);

if (
    empty($user) ||
    empty($mobile) ||
    empty($email) ||
    empty($rawPass)
) {
    die("All fields are required.");
}

$pass = password_hash($rawPass, PASSWORD_DEFAULT);


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

