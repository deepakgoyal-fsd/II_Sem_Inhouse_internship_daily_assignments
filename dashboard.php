<?php
session_start();

if(!isset($_SESSION['admin']))
{
    header("Location: ../login.php");
    exit();
}

include("../includes/db.php");

// Count Students
$student = mysqli_query($conn,"SELECT COUNT(*) AS total FROM student");
$studentCount = mysqli_fetch_assoc($student)['total'];

// Count Events
$event = mysqli_query($conn,"SELECT COUNT(*) AS total FROM events");
$eventCount = mysqli_fetch_assoc($event)['total'];

// Count Registrations
$registration = mysqli_query($conn,"SELECT COUNT(*) AS total FROM registrations");
$registrationCount = mysqli_fetch_assoc($registration)['total'];

// Count Conduct Requests
$request = mysqli_query($conn,"SELECT COUNT(*) AS total FROM conduct_request");
$requestCount = mysqli_fetch_assoc($request)['total'];

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
font-family:Arial,sans-serif;
}

body{
background:#f4f7fc;
}

header{

background:#0d47a1;
color:white;
padding:20px;
display:flex;
justify-content:space-between;
align-items:center;

}

header a{

color:white;
text-decoration:none;
background:red;
padding:10px 20px;
border-radius:5px;

}

.container{

width:90%;
margin:40px auto;

}

.cards{

display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:25px;

}

.card{

background:white;
padding:30px;
border-radius:12px;
box-shadow:0 5px 15px rgba(0,0,0,.2);
text-align:center;

}

.card h2{

font-size:45px;
color:#0d47a1;

}

.card h3{

margin-top:15px;

}

.menu{

margin-top:50px;
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;

}

.menu a{

background:#1565c0;
color:white;
text-decoration:none;
padding:18px;
text-align:center;
border-radius:10px;
font-size:18px;

}

.menu a:hover{

background:#0d47a1;

}

</style>

</head>

<body>

<header>

<h1>Admin Dashboard</h1>

<a href="logout.php">Logout</a>

</header>

<div class="container">

<div class="cards">

<div class="card">

<h2><?php echo $studentCount; ?></h2>

<h3>Total Students</h3>

</div>

<div class="card">

<h2><?php echo $eventCount; ?></h2>

<h3>Total Events</h3>

</div>

<div class="card">

<h2><?php echo $registrationCount; ?></h2>

<h3>Total Registrations</h3>

</div>

<div class="card">

<h2><?php echo $requestCount; ?></h2>

<h3>Conduct Requests</h3>

</div>

</div>

<div class="menu">

<a href="students.php">👨‍🎓 View Students</a>

<a href="registrations.php">📝 View Registrations</a>

<a href="events.php">🎉 Manage Events</a>

<a href="proposals.php">💡 Conduct Requests</a>

<a href="../index.php">🏠 Home Page</a>

</div>

</div>

</body>

</html>