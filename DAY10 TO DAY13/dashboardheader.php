<?php
session_start();

if(!isset($_SESSION['id']))
{
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f4f6f9;
}

.navbar{
    box-shadow:0px 3px 10px rgba(0,0,0,.3);
}

.card{
    border-radius:15px;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand fw-bold" href="dashboard.php">
<img src="uploads/655441202858347.669927576a831.webp" alt="logo" width="80">
</a>

<div class="d-flex align-items-center">

<span class="text-white me-3">
Welcome,
<strong><?php echo $_SESSION['name']; ?></strong>
</span>

<a href="profile.php" class="btn btn-info me-2">
Update Profile
</a>

<a href="updatepassword.php" class="btn btn-warning me-2">
Update Password
</a>

<a href="logout.php" class="btn btn-danger">
Logout
</a>

</div>

</div>

</nav>