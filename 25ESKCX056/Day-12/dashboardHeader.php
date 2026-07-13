<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>myWeb</title>
    

    <!-- bootstrap css -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"">
</head>
<body>
    <header class="bg-border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">

            <!-- logo -->
             <img src="https://www.freepnglogos.com/uploads/skeleton-starbucks-logo-png-29.png" alt="Logo" class="logo-img" style="width: 80px; height: 50px;">
                    <div class="logo">
                    <h1 class="m-0">My Website</h1>
                </div>
                <!-- navigation menu -->
                <nav>
                    <ul class="nav">
                        <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
                        <li class="nav-item"><a href="services.php" class="nav-link">Services</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                    </ul>
                </nav>
                
                <a href="logout.php" class = "btn btn-danger">Logout</a>
            
            </div>
        </div>
    </header>
<?php
  
  session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

?>
