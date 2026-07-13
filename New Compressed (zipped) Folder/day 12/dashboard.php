<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    die("<h2 style='color:red; font-family:sans-serif; text-align:center; padding-top:50px;'>Security Guard Exception: Please log in first.</h2>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Admin System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="dashboard.php">SKIT Portal Admin</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="dashboard.php">Home Dashboard</a>
                <a class="nav-link text-danger fw-bold" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="jumbotron p-5 bg-white rounded shadow-sm border text-center">
            <h1 class="display-5 text-primary fw-bold mb-3">Student Operations Management System</h1>
            <p class="lead text-muted">Integrated Full-Stack Data Matrix Portal Environment Hub.</p>
            <hr class="my-4">
            
            <div class="row g-4 mt-2 justify-content-center">
                <div class="col-md-5">
                    <div class="card h-100 p-3 border-primary shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary fw-bold">Data Entry Terminal</h5>
                            <p class="card-text text-muted">Add new student profile records permanently into the central MySQL table storage system.</p>
                            <a href="register.php" class="btn btn-primary w-100 fw-bold">Open Entry Form</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="card h-100 p-3 border-success shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-success fw-bold">Database Viewer Explorer</h5>
                            <p class="card-text text-muted">Review list records collections metrics rows running inside the live phpMyAdmin directory framework grids.</p>
                            <a href="view.php" class="btn btn-success w-100 fw-bold">Launch Table Explorer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>