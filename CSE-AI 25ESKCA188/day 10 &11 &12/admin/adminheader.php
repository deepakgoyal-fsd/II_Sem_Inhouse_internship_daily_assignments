<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != "admin") {
    header("Location: ../login.php");
    exit();
}

include("../db-connect.php");

$admin_id = $_SESSION['user_id'];

$query = "SELECT * FROM user WHERE id='$admin_id'";
$result = mysqli_query($conn, $query);

$admin = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link rel="stylesheet" href="../bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-expand-lg bg-success-subtle shadow px-4 py-2">

    <?php
    if(!empty($admin["profile_pic"])){
    ?>
        <img src="data:image/jpeg;base64,<?php echo base64_encode($admin["profile_pic"]); ?>"
             class="rounded-circle shadow"
             width="70"
             height="70">
    <?php
    }else{
    ?>
        <img src="../logo.png"
             class="rounded-circle shadow"
             width="70"
             height="70">
    <?php
    }
    ?>

    <div class="ms-3">
        <h5 class="mb-0">
            <?php echo $admin["name"]; ?>
        </h5>

        <small class="text-muted">
            Administrator
        </small>
    </div>

    <div class="d-flex ms-auto">

        <a href="#" class="nav-link mx-3">Home</a>

        <a href="#" class="nav-link mx-3">Users</a>

        <a href="#" class="nav-link mx-3">Settings</a>

        <a href="../logout.php" class="btn btn-outline-danger">
            Logout
        </a>

    </div>

</nav>