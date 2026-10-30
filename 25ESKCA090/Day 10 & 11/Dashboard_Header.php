<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="width=device-width, initial-scale=1.0">
    <title> Website </title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <header class="bg-light border-bottom">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center py-3">

            <!-- LOGO -->
            <img src="https://cdn.vectorstock.com/i/1000v/36/88/login-rectangular-sign-stamp-vector-56023688.jpg" alt="Rectangular distressed stamp reading LOGIN in large block letters; dark gray stamp rotated slightly on a white background, conveying a bold stamped or urgent tone" class="logo" width="80">

            <!-- NAVIGATION -->
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link text-dark">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="form.php" class="nav-link text-dark">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="registration.php" class="nav-link text-dark">Contact Us</a>
                    </li>
                </ul>
            </nav>

            <!-- Logout Button -->
             <button type="button" class="btn btn-danger" onclick="window.location.href='logout.php'">
                Logout
             </button>

        </div>
    </header>
