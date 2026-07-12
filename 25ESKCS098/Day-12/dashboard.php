<?php

session_start();

if(!isset($_SESSION['user_id'])){

header("Location: login.php");

exit();

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-dark bg-dark">

<div class="container">

<span class="navbar-brand">

Student Management System

</span>

<a href="logout.php" class="btn btn-danger">

Logout

</a>

</div>

</nav>

<div class="container mt-5">

<div class="card">

<div class="card-body">

<h2>

Welcome,

<?php echo $_SESSION['user_name']; ?>

</h2>

<p>

Email :

<?php echo $_SESSION['user_email']; ?>

</p>

<p>

User ID :

<?php echo $_SESSION['user_id']; ?>

</p>

</div>

</div>

</div>

</body>

</html>