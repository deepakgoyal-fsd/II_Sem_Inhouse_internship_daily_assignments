<?php

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Student Management Dashboard</h3>

</div>

<div class="card-body">

<div class="alert alert-success">

<h4>

Welcome,

<?php echo htmlspecialchars($_SESSION['user_name']); ?>!

</h4>

<p>

You have successfully logged in.

</p>

</div>
<div class="d-flex gap-2">

    <a href="students.php" class="btn btn-primary">

        Manage Students

    </a>

    <a href="index2.php" class="btn btn-success">

        Add Student

    </a>
    <a href="profile.php" class="btn btn-info">

My Profile

</a>
    <a href="change_password.php" class="btn btn-warning">

    Change Password

</a>

    <a href="logout.php" class="btn btn-danger">

        Logout

    </a>

</div>


</div>

</div>

</div>

</body>

</html>