<?php
include("db.php");

if(isset($_POST['register'])){

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];

$sql="INSERT INTO students(name,email,password)
VALUES('$name','$email','$password')";

mysqli_query($conn,$sql);

header("Location:login.php");

}
?>

<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" href="css/style.css">

<title>Register</title>

</head>

<body>

<div class="container">

<h1>Register</h1>

<form method="POST">

<input type="text" name="name" placeholder="Name">

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Password">

<button name="register">Register</button>

</form>

</div>

</body>

</html>