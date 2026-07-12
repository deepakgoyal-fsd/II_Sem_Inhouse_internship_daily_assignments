<?php
session_start();


if(!isset($_SESSION['user_name'])){
    header("location: login.php");
    exit();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1.
        0">
        <title>My Website</title>
        <link href="bootstrap.min.css"
        rel="stylesheet">
    </head>
    <body>
        <header class="bg-light border-bottom">
            <div class="container">
                <div class="d-flex
                justify-content-between
                align-items-centre py-3">

                <img src="image/logo.png"
                alt="logo" width="80">
                <nav>
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="index.php"
                            class="nav-link
                            text-dark">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="about.php" class="nav-link
                            text-dark">About us</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php" class="nav-link
                            text-dark">contact us</a>
                        </li>
                    </ul>
                </nav>

        <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>

            </div>
            </div>