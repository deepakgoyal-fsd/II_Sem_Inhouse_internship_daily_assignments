<?php
session_start();
if(!isset($_SESSION["admin_id"])){
    header("Location: admin_login.php");
    exit();
}
include("db_connect.php");
$totalUsers = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM users"));

$totalEvents = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM events"));

$totalBookings = mysqli_num_rows(mysqli_query($conn,
"SELECT * FROM bookings"));

$revenue = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT SUM(total_amount) AS total FROM bookings"));

$totalRevenue = $revenue["total"];

if($totalRevenue==""){

$totalRevenue=0;

}
$totalUsers = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM users"));

$totalEvents = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM events"));

$totalBookings = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM bookings"));

$revenue = mysqli_fetch_assoc(mysqli_query($conn,
"SELECT SUM(total_amount) AS total FROM bookings"));

$totalRevenue = $revenue["total"];

if($totalRevenue==""){
    $totalRevenue=0;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<style>
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:Arial;
    }
    body{
        background:#f2f2f2;
    }
    h1{
        text-align:center;
        margin:30px;
    }
    .container{
    width:90%;
    margin:auto;
    display:flex;
    justify-content:center;
    flex-wrap:wrap;
    gap:25px;
    }
    .card{
        width:250px;
        padding:30px;
        background:white;
        text-align:center;
        border-radius:10px;
        box-shadow:0px 0px 10px gray;
    }
    .card a{
        text-decoration:none;
        font-size:20px;
        color:#007bff;
    }
    .card:hover{
        transform:scale(1.05);
        transition:.3s;
    }
    .stats{

display:flex;

justify-content:center;

gap:20px;

flex-wrap:wrap;

margin:30px;

}

.box{

width:220px;

background:white;

padding:25px;

border-radius:10px;

box-shadow:0px 0px 10px gray;

text-align:center;

}

.box h2{

color:#007bff;

margin-bottom:10px;

}
</style>
</head>
<body>
    <h1>Welcome Admin</h1>
    <div class="stats">

<div class="box">

<h2><?php echo $totalUsers; ?></h2>

<p>Total Users</p>

</div>

<div class="box">

<h2><?php echo $totalEvents; ?></h2>

<p>Total Events</p>

</div>

<div class="box">

<h2><?php echo $totalBookings; ?></h2>

<p>Total Bookings</p>

</div>

<div class="box">

<h2>₹<?php echo $totalRevenue; ?></h2>

<p>Total Revenue</p>

</div>

</div>
    <div class="container">
        <div class="card">
            <a href="add_event.php">Add Event</a>
        </div>
        <div class="card">
            <a href="view_events.php">Manage Events</a>
        </div>
        <div class="card">
            <a href="view_bookings.php">View Bookings</a>
        </div>
        <div class="card">
            <a href="view_users.php">View Users</a>
        </div>
        <div class="card">
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>
</html>