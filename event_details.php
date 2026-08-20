<?php
$category = "";

if(isset($_GET['category']))
{
    $category = $_GET['category'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?php echo $category; ?> Events</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#f4f7fb;
padding-top:90px;
}

nav{
position:fixed;
top:0;
left:0;
width:100%;
display:flex;
justify-content:space-between;
align-items:center;
padding:18px 50px;
background:#0d47a1;
z-index:1000;
}

.logo{
color:white;
font-size:28px;
font-weight:bold;
}

nav ul{
display:flex;
list-style:none;
}

nav ul li{
margin-left:25px;
}

nav ul li a{
color:white;
text-decoration:none;
font-size:18px;
}

nav ul li a:hover{
color:#ffd54f;
}

.heading{
text-align:center;
margin:40px 0;
}

.heading h1{
font-size:42px;
color:#0d47a1;
}

.container{
width:90%;
margin:auto;
display:grid;
grid-template-columns:repeat(auto-fit,minmax(320px,1fr));
gap:30px;
padding-bottom:50px;
}

.card{
background:white;
border-radius:15px;
box-shadow:0 8px 20px rgba(0,0,0,.15);
overflow:hidden;
transition:.3s;
}

.card:hover{
transform:translateY(-8px);
}

.card img{
width:100%;
height:220px;
object-fit:cover;
}

.content{
padding:20px;
}

.content h2{
color:#0d47a1;
margin-bottom:15px;
}

.content p{
margin:8px 0;
line-height:1.6;
font-size:16px;
}

.btn{
display:inline-block;
margin-top:15px;
padding:12px 25px;
background:#1565c0;
color:white;
text-decoration:none;
border-radius:8px;
}

.btn:hover{
background:#0d47a1;
}

</style>

</head>

<body>

<nav>

<div class="logo">SKIT Event Portal</div>

<ul>

<li><a href="index.php">Home</a></li>

<li><a href="gallery.php">Gallery</a></li>

<li><a href="contact.php">Contact</a></li>

</ul>

</nav>

<div class="heading">
<h1><?php echo $category; ?> Events</h1>
</div>

<div class="container">

<?php

if($category=="Technical")
{
?>

<div class="card">

<img src="images/technical.jpeg">

<div class="content">

<h2>Coding Competition</h2>

<p><b>Date:</b> 15 August 2026</p>

<p><b>Time:</b> 10:00 AM</p>

<p><b>Venue:</b> Computer Lab</p>

<p>Programming contest for students.</p>

<a href="register.php" class="btn">Register Now</a>

</div>

</div>

<div class="card">

<img src="images/robotics.jpeg">

<div class="content">

<h2>Robotics Challenge</h2>

<p><b>Date:</b> 16 August 2026</p>

<p><b>Time:</b> 11:00 AM</p>

<p><b>Venue:</b> Seminar Hall</p>

<p>Build and showcase robotics projects.</p>

<a href="register.php" class="btn">Register Now</a>

</div>

</div>

<?php
}

elseif($category=="Cultural")
{
?>

<div class="card">

<img src="images/cultural.jpeg">

<div class="content">

<h2>Dance Competition</h2>

<p><b>Date:</b> 20 August 2026</p>

<p><b>Time:</b> 4:00 PM</p>

<p><b>Venue:</b> Auditorium</p>

<p>Solo and Group Dance Competition.</p>

<a href="register.php" class="btn">Register Now</a>

</div>

</div>

<div class="card">

<img src="images/music.jpeg">

<div class="content">

<h2>Singing Competition</h2>

<p><b>Date:</b> 21 August 2026</p>

<p><b>Time:</b> 3:00 PM</p>

<p><b>Venue:</b> Auditorium</p>

<p>Show your singing talent.</p>

<a href="register.php" class="btn">Register Now</a>

</div>

</div>

<?php
}

elseif($category=="Sports")
{
?>

<div class="card">

<img src="images/cricket.jpeg">

<div class="content">

<h2>Cricket Tournament</h2>

<p><b>Date:</b> 25 August 2026</p>

<p><b>Time:</b> 9:00 AM</p>

<p><b>Venue:</b> College Ground</p>

<p>Inter-department Cricket Tournament.</p>

<a href="register.php" class="btn">Register Now</a>

</div>

</div>

<div class="card">

<img src="images/football.jpeg">

<div class="content">

<h2>Football Match</h2>

<p><b>Date:</b> 26 August 2026</p>

<p><b>Time:</b> 8:30 AM</p>

<p><b>Venue:</b> Sports Ground</p>

<p>Football Championship.</p>

<a href="register.php" class="btn">Register Now</a>

</div>

</div>

<?php
}

elseif($category=="Workshop")
{
?>

<div class="card">

<img src="images/workshop.jpeg">

<div class="content">

<h2>AI Workshop</h2>

<p><b>Date:</b> 30 August 2026</p>

<p><b>Time:</b> 10:00 AM</p>

<p><b>Venue:</b> Smart Classroom</p>

<p>Hands-on Artificial Intelligence Workshop.</p>

<a href="register.php" class="btn">Register Now</a>

</div>

</div>

<div class="card">

<img src="images/cyber.jpeg">

<div class="content">

<h2>Cyber Security Workshop</h2>

<p><b>Date:</b> 31 August 2026</p>

<p><b>Time:</b> 11:00 AM</p>

<p><b>Venue:</b> Seminar Hall</p>

<p>Learn Ethical Hacking Basics.</p>

<a href="register.php" class="btn">Register Now</a>

</div>

</div>

<?php
}
?>

</div>

</body>
</html>