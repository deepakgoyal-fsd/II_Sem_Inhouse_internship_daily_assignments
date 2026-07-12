<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include("db_connect.php");

if (!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
    <div class="container-fluid">
        
        <a class="navbar-brand" href="dashboard.php">
    <img src="https://marketplace.canva.com/EAFvMagh96A/2/0/1600w/canva-colorful-modern-infinity-technology-free-logo-pUhZOkMnsk8.jpg" alt="Logo" style="height: 30px; width: auto;" class="me-2">Dashboard
</a>
        <div class="d-flex align-items-center ms-auto">
            <span class="text-white me-3">Welcome, <?php echo $_SESSION['user_name']; ?>!</span>
            <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
        </div>
    </div>
</nav>