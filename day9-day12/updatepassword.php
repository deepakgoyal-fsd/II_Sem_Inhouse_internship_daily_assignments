<?php
session_start();

include("db_connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once __DIR__ . '/checkupdateError.php';
}

include("dashboardHeader.php");
include("checkupdateError.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-sm p-4 style-form" style="width: 100%; max-width: 500px; background: #ffffff; border-radius: 8px;">
        
        <h3 class="text-center mb-4" style="color: #333; font-weight: 500;">Update Password</h3>
        
        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger p-2 fs-6">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo '<div class="alert alert-success p-2 fs-6">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']);
        }
        ?>

        <form action="checkupdateError.php" method="POST">
            
            <div class="mb-3">
                <label class="form-label text-secondary fw-semibold">Current Password</label>
                <input type="password" name="currentPassword" class="form-control p-2" placeholder="•••••" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label text-secondary fw-semibold">New Password</label>
                <input type="password" name="NewPassword" class="form-control p-2" placeholder="New Password" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label text-secondary fw-semibold">Confirm New Password</label>
                <input type="password" name="confirmNewPassword" class="form-control p-2" placeholder="Confirm New Password" required>
            </div>
            
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary btn-block p-2 fw-bold" style="background-color: #0d6efd; border: none;">Update Password</button>
            </div>
            
        </form>
    </div>
</div>

</body>
</html>