<?php
session_start();

if (!isset($_SESSION["user_email"])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Student Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand fw-bold" href="dashboard.php">Student System</a>

            <div class="ms-auto d-flex align-items-center gap-3">
                <span class="text-white">Welcome, <?php echo $_SESSION["user_name"]; ?></span>
                <a href="logout.php" class="btn btn-light btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group shadow-sm">
                    <a href="#" class="list-group-item list-group-item-action active">Dashboard</a>
                    <a href="#" class="list-group-item list-group-item-action">Students</a>
                    <a href="#" class="list-group-item list-group-item-action">Courses</a>
                    <a href="#" class="list-group-item list-group-item-action">Reports</a>
                </div>
            </div>

            <div class="col-md-9">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h3>Dashboard</h3>
                        <p class="text-muted">This is a protected page. Only logged-in users can see this page.</p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card text-bg-info mb-3">
                            <div class="card-body">
                                <h5>Total Students</h5>
                                <h2>120</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-bg-success mb-3">
                            <div class="card-body">
                                <h5>Active Courses</h5>
                                <h2>8</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-bg-warning mb-3">
                            <div class="card-body">
                                <h5>Last Login</h5>
                                <p class="mb-0"><?php echo $_SESSION["login_time"]; ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header fw-bold">Session Details</div>
                    <div class="card-body">
                        <p><strong>Name:</strong> <?php echo $_SESSION["user_name"]; ?></p>
                        <p><strong>Email:</strong> <?php echo $_SESSION["user_email"]; ?></p>
                        <p><strong>Status:</strong> Logged in successfully</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
