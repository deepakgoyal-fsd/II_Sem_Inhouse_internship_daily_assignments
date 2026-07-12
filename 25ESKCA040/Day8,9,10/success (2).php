<?php
session_start();

if(!isset($_SESSION['username'])){

    header("Location: login.php");
    exit();

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <div class="alert alert-success">

        <h3>Welcome <?php echo $_SESSION['username']; ?></h3>

        <p>You have successfully logged in.</p>

    </div>

    <a href="logout.php" class="btn btn-danger">Logout</a>

</div>

</body>
</html>