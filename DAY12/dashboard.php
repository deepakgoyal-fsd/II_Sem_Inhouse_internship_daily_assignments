<?php
include("session.php");
include("db_connect.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="text-center text-success">
Welcome to Dashboard
</h2>

<hr>

<div class="d-grid gap-3">

<a href="profile.php" class="btn btn-primary">
My Profile
</a>

<a href="change_password.php" class="btn btn-warning">
Change Password
</a>

<a href="forgot_password.php" class="btn btn-info text-white">
Forgot Password
</a>

<a href="students.php" class="btn btn-success">
Manage Students
</a>

<a href="logout.php" class="btn btn-danger">
Logout
</a>

</div>

</div>

</div>

</body>
</html>