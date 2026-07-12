<?php
include("db.php");

if(isset($_POST['update'])){

$name=$_POST['name'];

$sql="UPDATE students SET name='$name' WHERE id=1";

mysqli_query($conn,$sql);

echo "<script>alert('Profile Updated')</script>";

}
?>

<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" href="style.css">

<title>Update Profile</title>

</head>

<body>

<header>

<div class="logo">
<img src="images/logo.png">
</div>

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

<h1>Update Profile</h1>

<form method="POST">

<input type="text" name="name" placeholder="Enter New Name">

<button name="update">Update Profile</button>

</form>

</div>

<footer>

© 2026 My Website. All Rights Reserved.

</footer>

</body>

</html>