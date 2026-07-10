<?php

$basePath = "";

if (strpos(str_replace("\\", "/", $_SERVER["SCRIPT_NAME"]), "/admin/") !== false) {
    $basePath = "../";
}

if(!isset($_SESSION['user_name'])){
    header("location: " . $basePath . "login.php");
    exit();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Website</title>
    <link href="<?=$basePath?>bootstrap.min.css" rel="stylesheet">
    <link href="<?=$basePath?>style.css" rel="stylesheet">

</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark site-navbar">

        <div class="container align-items-center py-3">
            <a class="navbar-brand" href="<?=$basePath?>dashboard.php">
            <img src="<?=$basePath?>logo.png" width="40" alt="logo">
            Yash Agarwal
            </a>


            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$basePath?>home.php">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=$basePath?>about.php">About Us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="<?=$basePath?>contact.php">Contact</a>
                    </li>
                </ul>
            </div>
            <a href="<?=$basePath?>login.php" class="btn btn-outline-danger">Logout</a>
        </div>
    </nav>
</header>
