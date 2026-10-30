<?php
session_start();
include 'db_connect.php'; 

// Protect the page
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Get the current file name so the sidebar knows which link to highlight
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .sidebar { width: 250px; }
    </style>
</head>
<body class="bg-light">

    <header class="top-nav d-flex justify-content-between">
        <div class="d-flex align-items-center">
            <button class="toggle-btn me-3" id="sidebarToggle" title="Toggle Sidebar">&#9776;</button>
            <h5 class="mb-0 fw-bold text-dark">Training Admin Panel</h5>
        </div>
        <div>
            <span class="text-muted fw-bold me-3">Welcome, Admin Kunal</span>
        </div>
    </header>

    <div class="page-wrapper">
        <div class="bg-dark text-white p-3 sidebar shadow" id="sidebar">
            <ul class="nav flex-column mt-3">
                <li class="nav-item mb-2">
                    <a class="nav-link <?php echo ($current_page == 'index.php') ? 'text-white bg-secondary rounded' : 'text-light'; ?>" href="index.php">Dashboard (Trainees)</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link <?php echo ($current_page == 'trainers.php') ? 'text-white bg-secondary rounded' : 'text-light'; ?>" href="trainers.php">Manage Trainers</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link <?php echo ($current_page == 'courses.php') ? 'text-white bg-secondary rounded' : 'text-light'; ?>" href="courses.php">Manage Courses</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="nav-link <?php echo ($current_page == 'attendance.php') ? 'text-white bg-secondary rounded' : 'text-light'; ?>" href="attendance.php">Attendance Logs</a>
                </li>
                <li class="nav-item mt-4">
                    <a class="nav-link text-danger fw-bold" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>

        <div class="p-4 main-content">