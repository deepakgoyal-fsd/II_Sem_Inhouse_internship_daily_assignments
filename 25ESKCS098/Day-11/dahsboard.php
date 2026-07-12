<?php

session_start();

if(!isset($_SESSION['user_id'])){

header("Location: login.php");

exit();

}

include("db_connect.php");

$id=$_SESSION['user_id'];

$result=mysqli_query($conn,"SELECT * FROM users WHERE id=$id");

$user=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand">

Student Management System

</a>

<div>

<img src="uploads/<?php echo $user['profile_picture']; ?>" width="40" height="40" class="rounded-circle">

<span class="text-white">

<?php echo $user['name']; ?>

</span>

</div>

</div>

</nav>

<div class="container mt-5">

<div class="card">

<div class="card-body">

<h2>

Welcome,

<?php echo $user['name']; ?>

</h2>

<hr>

<p>

<b>Email :</b>

<?php echo $user['email']; ?>

</p>

<p>

<b>User ID :</b>

<?php echo $user['id']; ?>

</p>

<hr>

<a href="profile.php" class="btn btn-primary">

Profile

</a>

<a href="change_password.php" class="btn btn-warning">

Change Password

</a>

<a href="logout.php" class="btn btn-danger">

Logout

</a>

</div>

</div>

</div>

</body>

</html>