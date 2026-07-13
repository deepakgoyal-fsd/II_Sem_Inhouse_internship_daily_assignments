<?php
session_start();


if (!isset($_SESSION['admin_logged_in'])) {
    die("<h2 style='color:red; font-family:sans-serif; text-align:center; padding-top:50px;'>Security Guard Exception: Authorized Session Missing! Please log in first.</h2>");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Day 11 Assignment - Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

    <div class="container">
        <div class="card p-5 bg-white shadow-sm border rounded text-center" style="max-width: 600px; margin: 0 auto;">
            <div class="alert alert-success fw-bold fs-4 mb-4">
                🔒 Secure Admin Dashboard Active
            </div>
            
            <p class="lead text-secondary">Welcome, System Administrator. You have successfully bypassed the framework security checkpoint wall using PHP session tokens.</p>
            
            <hr class="my-4">
            
            <div class="d-flex justify-content-around mt-4">
                <a href="view.php" class="btn btn-outline-primary fw-bold">Manage Student Database Table</a>
                <a href="logout.php" class="btn btn-dark fw-bold">Destroy Session (Logout)</a>
            </div>
        </div>
    </div>

</body>
</html>