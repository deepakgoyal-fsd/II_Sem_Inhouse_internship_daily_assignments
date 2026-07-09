<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Portal - Day 8</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-header {
            background: linear-gradient(135deg, #0062cc, #00d2ff);
        }
    </style>
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="index.php"><i class="fa-solid fa-graduation-cap text-warning me-2"></i>SKIT Portal</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?= (isset($page) && $page == 'home') ? 'active fw-bold text-warning' : '' ?>" href="index.php">
                            <i class="fa-solid fa-house me-1"></i> Register Form
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (isset($page) && $page == 'about') ? 'active fw-bold text-warning' : '' ?>" href="#">
                            <i class="fa-solid fa-circle-info me-1"></i> About
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= (isset($page) && $page == 'contact') ? 'active fw-bold text-warning' : '' ?>" href="#">
                            <i class="fa-solid fa-envelope me-1"></i> Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>