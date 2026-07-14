<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header d-flex justify-content-between">
            <h3>Dashboard</h3>

            <a href="logout.php" class="btn btn-danger">
                Logout
            </a>
        </div>

        <div class="card-body">

            <h4>Welcome,
                <?php echo $_SESSION['user_name']; ?>
            </h4>

            <p>Email:
                <?php echo $_SESSION['user_email']; ?>
            </p>

            <hr>

            <h5>You have successfully logged in.</h5>

        </div>

    </div>

</div>

</body>
</html>