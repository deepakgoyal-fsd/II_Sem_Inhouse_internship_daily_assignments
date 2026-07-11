<?php
session_start();

  if(!isset($_SESSION['user_name'])){
    header("Location: login.php");
    exit();
  }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">
    <!-- Navbar Layout -->
    <nav class="navbar navbar-expand-lg navbar-white bg-white border-bottom shadow-sm py-3 mb-4">
        <div class="container-fluid px-4">
            <span class="navbar-brand fw-bold text-secondary">Logo</span>
            <div class="mx-auto">
                <a class="text-secondary text-decoration-none mx-3" href="#">Home</a>
                <a class="text-secondary text-decoration-none mx-3" href="#">About Us</a>
                <a class="text-secondary text-decoration-none mx-3" href="#">Contact Us</a>
            </div>
            <a href="logout.php" class="btn btn-outline-secondary btn-sm px-3">Logout</a>
        </div>
    </nav>