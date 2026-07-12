<?php
session_start();
include("db_connect.php");
include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 450px; background: #ffffff;">

        <h3 class="text-center mb-4">Login</h3>

        <?php
        if (isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger p-2 fs-6">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        ?>

        <form action="checkLoginError.php" method="POST">

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
            </div>

            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary p-2 fw-bold">Login</button>
            </div>

        </form>

    </div>
</div>

</body>
</html>