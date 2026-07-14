<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Management Portal</title>

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    
   <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="container">

        <a class="navbar-brand fw-bold" href="index.php">
            Student Management Portal
        </a>

        <div>

<?php if(session_status() == PHP_SESSION_NONE){
    session_start();
} ?>

<?php if(isset($_SESSION['user_id'])){ ?>

    <a href="dashboard.php" class="btn btn-light btn-sm me-2">
        Dashboard
    </a>

    <a href="profile.php" class="btn btn-light btn-sm me-2">
        Profile
    </a>

    <a href="logout.php" class="btn btn-danger btn-sm">
        Logout
    </a>

<?php } else { ?>

    <a href="register.php" class="btn btn-light btn-sm me-2">
        Register
    </a>

    <a href="login.php" class="btn btn-warning btn-sm">
        Login
    </a>

<?php } ?>

</div>

    </div>

</nav>