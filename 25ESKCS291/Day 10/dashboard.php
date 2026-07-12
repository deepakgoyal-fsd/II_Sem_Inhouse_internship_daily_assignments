<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
include("db_connect.php");
$query = "SELECT COUNT(*) AS total_students FROM students";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$total_students = $row['total_students'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="d-flex">
    <div class="bg-primary text-white p-3 vh-100" style="width:250px;">
        <h3 class="text-center mb-4">Admin Panel</h3>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="dashboard.php" class="nav-link text-white">Dashboard</a>
            </li>
            <li class="nav-item mb-2">
                <a href="students.php" class="nav-link text-white">Student Information</a>
            </li>
            <li class="nav-item mb-2">
                <a href="add_student.php" class="nav-link text-white">Add Student</a>
            </li>
            <li class="nav-item mt-4">
                <a href="logout.php" class="nav-link text-white">Logout</a>
            </li>
        </ul>
    </div>
    <div class="flex-grow-1">
        <nav class="navbar navbar-expand-lg bg-light shadow-sm">
            <div class="container-fluid">
                <h4 class="mb-0">Dashboard</h4>
                <span class="fw-semibold">
                    Welcome, <?php echo $_SESSION['admin']; ?>
                </span>
            </div>
        </nav>
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="card shadow border-0">
                        <div class="card-body text-center">
                            <h5>Total Students</h5>
                            <h2 class="text-primary">
                                <?php echo $total_students; ?>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card shadow border-0 mt-4">
                <div class="card-body">
                    <h4>Welcome to Student Management System</h4>
                    <p class="mb-0">
                        Use the sidebar to manage student records.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>