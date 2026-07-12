<?php
include("session_check.php");
include("db.php");
$total=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM students"));
$male=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM students WHERE gender='Male'"));
$female=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM students WHERE gender='Female'"));
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "partials/header.php"; ?>
    <div class="main">
        <?php include "partials/sidebar.php"; ?>
        <div class="content">
            <h1>Dashboard</h1>
            <div class="cards">
                <div class="card">
                    <h3>Total Students</h3>
                    <h1><?php echo $total; ?></h1>
                </div>
                <div class="card">
                    <h3>Male Students</h3>
                    <h1><?php echo $male; ?></h1>
                </div>
                <div class="card">
                    <h3>Female Students</h3>
                    <h1><?php echo $female; ?></h1>
                </div>
            </div>
        </div>
    </div>
</body>
</html>