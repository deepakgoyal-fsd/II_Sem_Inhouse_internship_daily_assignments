<?php
session_start();
if (!isset($_SESSION['user_name'])) {
    header("location: login.php");
    exit();
    }    
?>    
    
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg bg-success-subtle shadow px-4 py-2">
            <img src="image/please.jpg" class="navbar-brand mx-3 rounded-circle shadow" height="100px" width="100px" alt="Logo">
            <div class="d-flex ms-auto">
                <a href="" class="nav-link text-dark mx-5 fw-semibold">Home</a>
                <a href="" class="nav-link text-dark mx-5 fw-semibold">About</a>
                <a href="" class="nav-link text-dark mx-5 fw-semibold">Contact Us</a>
                <a href="logout.php" class="btn btn-outline-danger">Logout</a>
            </div>
        </nav>
    </body>

    </html>