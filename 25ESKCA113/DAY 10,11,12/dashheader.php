<?php
    session_start();
    if(!isset($_SESSION['user_name'])){
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
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <body>
    <header class="bg-light border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">

                <!-- Logo -->
                <img src="images (1).jpg" alt="Logo" width="80">

                <!-- Navigation -->
                <nav>
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="index.php"
                            class="nav-link text-dark">Home</a>
                        </li>

                        <li class="nav-item">
                            <a href="about.php"
                            class="nav-link text-dark">About US</a>
                        </li>

                        <li class="nav-item">
                            <a href="contact.php"
                            class="nav-link text-dark">Contact US</a>
                        </li>
    
                    </ul>
                </nav>
                    <!-- <button type = "submit" class="btn btn-danger w-400" >Log out</button> -->
                    <button type = "button" class="btn btn-danger" onclick="window.location.href='logout.php'"> log out</button>
                
            </div>
        </div>
    </header>
</body>
</html>
