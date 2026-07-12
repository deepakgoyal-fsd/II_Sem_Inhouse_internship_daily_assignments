<?php
include("db.php");
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<header>



<nav>

<ul>

<li><a href="#">Home</a></li>

<li><a href="#">About Us</a></li>

<li><a href="#">Contact Us</a></li>

</ul>

</nav>

<a href="login.php" class="login-btn">Login</a>

</header>

<div class="container">

<h1>Login</h1>

<form method="POST">

<input type="email" name="email" placeholder="Email">

<input type="password" name="password" placeholder="Password">

<button name="login">Login</button>

</form>

<p>Don't have an account?
<a href="register.php">Register</a>
</p>

</div>

</body>
</html>

<?php

if(isset($_POST['login'])){

$email=$_POST['email'];
$password=$_POST['password'];

$sql="SELECT * FROM students WHERE email='$email' AND password='$password'";

$result=mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

header("Location:updateProfile.php");

}else{

echo "<script>alert('Invalid Login')</script>";

}

}

?>