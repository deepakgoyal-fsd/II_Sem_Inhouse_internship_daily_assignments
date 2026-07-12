<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
       .container{
            width:80%;
            margin:40px auto;
            text-align:center;
        }
        .card{
            display:inline-block;               width:250px;
            padding:25px;
            margin:20px;
            background:#f4f4f4;
            border-radius:10px;
            box-shadow:0px 0px 10px gray;
        }
        .card a{
            text-decoration:none;
            font-size:20px;
            color:#007bff;
        }
    </style>
</head>
<body>
    <body>
        <div class="container">
            <h1>Welcome,
                <?php echo $_SESSION["fullname"]; ?>
            </h1>
            <br>
            <div class="card">
                <a href="events.php">Book Ticket</a>
            </div>
            <div class="card">
                <a href="my_bookings.php">My Bookings</a>
            </div>
            <div class="card">
                <a href="profile.php">Profile</a>
            </div>
            <div class="card">
                <a href="change_password.php">Change</a>
            </div>
            <div class="card">
                <a href="logout.php">Logout</a>
            </div>
        </div>
</body>
</html>
<?php
include("footer.php");
?>