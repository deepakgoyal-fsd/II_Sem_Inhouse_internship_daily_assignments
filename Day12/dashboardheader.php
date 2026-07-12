<?php

session_start();

if(!isset($_SESSION['user_name'])){

header("location: loginday11.php");

exit();
}

?>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>My Website</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<header class="bg-light border-bottom">

<div class="container">

<div class="d-flex justify-content-between
    align-items-center py-3">
     <!-- #region 
      -->
     <img src="banana.jpeg"
     alt="banana" width="80">
       <nav>
        <ul class="nav">
            
            <li class="nav-item">
                <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Contact</a>
            </li>
            </ul>
            </nav>
           <div class="col-3 text-end">
            <button type="button" class="btn btn-primary">Login</button> </div>
            <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
        </div>
    </div>
    </header>

