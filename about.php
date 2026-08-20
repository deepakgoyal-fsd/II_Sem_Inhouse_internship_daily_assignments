<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>About | SKIT Campus Event Management</title>

<link rel="stylesheet" href="css/style.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}

body{
    background:#f4f4f4;
}

/* Navbar */

nav{
    width:100%;
    background:#0d47a1;
    padding:80px 10%;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

nav h2{
    color:white;
}

nav ul{
    list-style:none;
    display:flex;
}

nav ul li{
    margin-left:20px;
}

nav ul li a{
    color:white;
    text-decoration:none;
    font-weight:bold;
}

/* Banner */

.banner{
    background:url("images/skit.jpeg") no-repeat center center/cover;
    height:300px;
    display:flex;
    justify-content:center;
    align-items:center;
}

.banner h1{
    color:white;
    background:rgba(0,0,0,.6);
    padding:20px 40px;
    border-radius:10px;
}

/* Sections */

.container{
    width:90%;
    margin:auto;
    padding:50px 0;
}

.section{
    background:white;
    padding:30px;
    margin-bottom:30px;
    border-radius:10px;
    box-shadow:0 5px 10px rgba(0,0,0,.2);
}

.section h2{
    color:#0d47a1;
    margin-bottom:15px;
}

.section p{
    line-height:1.8;
    text-align:justify;
}

.cards{
    display:flex;
    justify-content:space-between;
    flex-wrap:wrap;
    gap:20px;
    margin-top:20px;
}

.card{
    flex:1;
    min-width:220px;
    background:#e3f2fd;
    padding:20px;
    border-radius:10px;
    text-align:center;
}

.card h3{
    color:#1565c0;
    margin-bottom:10px;
}

footer{
    background:#0d47a1;
    color:white;
    text-align:center;
    padding:15px;
}

</style>

</head>

<body>

<nav>

<h2>SKIT Event Portal</h2>

<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="register.php">Register</a></li>
<li><a href="gallery.php">Gallery</a></li>
<li><a href="contact.php">Contact</a></li>
</ul>

</nav>

<section class="banner">
    <h1>About SKIT</h1>
</section>

<div class="container">

<div class="section">

<h2>About Our College</h2>

<p>
Swami Keshvanand Institute of Technology, Management and Gramothan (SKIT), Jaipur,
is one of Rajasthan's leading engineering institutes. It provides quality education,
excellent infrastructure, modern laboratories, experienced faculty, and a vibrant
campus environment. The institute encourages innovation, research, technical skills,
sports, and cultural development.
</p>

</div>

<div class="section">

<h2>Campus Events</h2>

<p>
SKIT organizes various technical, cultural, sports, and workshop events throughout
the year. These events help students improve their technical knowledge, leadership,
teamwork, communication, creativity, and confidence. Students from different
departments actively participate and showcase their talents.
</p>

</div>

<div class="section">

<h2>Why Participate?</h2>

<div class="cards">

<div class="card">
<h3>Technical Events</h3>
<p>Coding competitions, hackathons, robotics, quizzes, and innovation challenges.</p>
</div>

<div class="card">
<h3>Cultural Events</h3>
<p>Dance, singing, drama, fashion shows, and music performances.</p>
</div>

<div class="card">
<h3>Sports Events</h3>
<p>Cricket, football, volleyball, badminton, athletics, and indoor games.</p>
</div>

<div class="card">
<h3>Workshops</h3>
<p>Hands-on training in AI, Web Development, IoT, Cyber Security, and more.</p>
</div>

</div>

</div>

</div>

<footer>

<p>&copy; 2026 SKIT Campus Event Management System | Developed by Akansha Sharma</p>

</footer>

</body>
</html>