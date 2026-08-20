<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Event Gallery | SKIT Event Portal</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:linear-gradient(135deg,#e3f2fd,#ffffff);
}

/* Navbar */

nav{
    background:#0d47a1;
    padding:15px 40px;
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
    margin-left:25px;
}

nav ul li a{
    color:white;
    text-decoration:none;
    font-weight:bold;
}

nav ul li a:hover{
    color:#ffd54f;
}

/* Header */

.header{
    background:linear-gradient(90deg,#1565c0,#42a5f5);
    color:white;
    text-align:center;
    padding:50px 20px;
}

.header h1{
    font-size:40px;
}

.header p{
    margin-top:10px;
    font-size:18px;
}

/* Gallery */

.gallery{
    width:90%;
    margin:40px auto;
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
    gap:30px;
}

.card{
    background:white;
    border-radius:15px;
    overflow:hidden;
    box-shadow:0 10px 20px rgba(0,0,0,.2);
    transition:.3s;
}

.card:hover{
    transform:translateY(-10px);
}

.card img{
    width:100%;
    height:220px;
    object-fit:cover;
}

.card-content{
    padding:20px;
}

.card-content h2{
    color:#0d47a1;
    margin-bottom:10px;
}

.card-content p{
    color:#555;
    line-height:1.6;
}

.btn{
    display:inline-block;
    margin-top:20px;
    padding:12px 25px;
    background:#ff9800;
    color:white;
    text-decoration:none;
    border-radius:30px;
    font-weight:bold;
}

.btn:hover{
    background:#e68900;
}

/* Footer */

footer{
    background:#0d47a1;
    color:white;
    text-align:center;
    padding:20px;
    margin-top:50px;
}

</style>

</head>

<body>

<nav>

<h2>SKIT Event Portal</h2>

<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="gallery.php">Gallery</a></li>
<li><a href="contact.php">Contact</a></li>
<li><a href="login.php">Admin</a></li>
</ul>

</nav>

<div class="header">

<h1>🎉 SKIT Event Gallery</h1>

<p>Choose your favourite event and register now.</p>

</div>

<div class="gallery">

<div class="card">

<img src="images/technical.jpeg">

<div class="card-content">

<h2>💻 Technical Fest</h2>

<p>
Coding competitions, Hackathon, Robotics, AI Exhibition and Innovative Student Projects.
</p>

<a href="register.php?event=Technical Fest" class="btn">
Register Now
</a>

</div>

</div>


<div class="card">

<img src="images/cultural.jpeg">

<div class="card-content">

<h2>🎭 Cultural Fest</h2>

<p>
Dance, Singing, Drama, Fashion Show, Rangoli and Cultural Performances.
</p>

<a href="register.php?event=Cultural Fest" class="btn">
Register Now
</a>

</div>

</div>


<div class="card">

<img src="images/sports.jpeg">

<div class="card-content">

<h2>🏆 Sports Meet</h2>

<p>
Cricket, Football, Volleyball, Athletics, Chess and Indoor Games.
</p>

<a href="register.php?event=Sports Meet" class="btn">
Register Now
</a>

</div>

</div>


<div class="card">

<img src="images/workshop.jpeg">

<div class="card-content">

<h2>🛠 Workshop</h2>

<p>
Hands-on workshops on Web Development, AI, Cyber Security and IoT.
</p>

<a href="register.php?event=Workshop" class="btn">
Register Now
</a>

</div>

</div>


<div class="card">

<img src="images/seminar.jpeg">

<div class="card-content">

<h2>🎤 Seminar</h2>

<p>
Expert talks from Industry Professionals and Successful Alumni.
</p>

<a href="register.php?event=Seminar" class="btn">
Register Now
</a>

</div>

</div>


<div class="card">

<img src="images/innovation.jpeg">

<div class="card-content">

<h2>🚀 Innovation Expo</h2>

<p>
Present your innovative ideas and compete with the best student teams.
</p>

<a href="register.php?event=Innovation Expo" class="btn">
Register Now
</a>

</div>

</div>

</div>

<footer>

© 2026 SKIT Campus Event Management System

</footer>

</body>
</html>