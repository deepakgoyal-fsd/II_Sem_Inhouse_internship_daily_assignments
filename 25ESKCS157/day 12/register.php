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
    <title>Register Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="dashboard.php">SKIT Portal Admin</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="dashboard.php">Home Dashboard</a>
                <a class="nav-link text-danger fw-bold" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4 shadow-sm bg-white border">
                    <h3 class="text-center mb-4">Database Registration</h3>
                    <form action="submit.php" method="POST">
                        <div class="mb-3">
                            <label class="form-label">Student Name:</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Branch Code:</label>
                            <input type="text" name="branch" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 fw-bold">Save Permanently</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>