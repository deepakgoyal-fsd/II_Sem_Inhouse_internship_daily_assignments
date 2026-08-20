<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>SKIT Campus Event Management System</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Poppins',sans-serif;
scroll-behavior:smooth;
}

body{

background:#FFF9F5;

}

/* ================= NAVBAR ================= */

nav{

position:fixed;
top:0;
left:0;
width:100%;
padding:18px 70px;

display:flex;
justify-content:space-between;
align-items:center;

background:rgba(255,255,255,.25);

backdrop-filter:blur(15px);

z-index:1000;

box-shadow:0 5px 20px rgba(0,0,0,.1);

}

.logo{

font-size:30px;
font-weight:700;
color:#0D47A1;

}

nav ul{

display:flex;
list-style:none;

}

nav ul li{

margin-left:35px;

}

nav ul li a{

text-decoration:none;
color:#0D47A1;
font-size:17px;
font-weight:500;
transition:.3s;

}

nav ul li a:hover{

color:#E91E63;

}

/* ================= HERO ================= */

.hero{

height:100vh;

background:

linear-gradient(rgba(0,0,0,.45),rgba(0,0,0,.45)),

url("images/skit.jpg");

background-size:cover;
background-position:center;

display:flex;
justify-content:center;
align-items:center;

padding:40px;

}

.hero-box{

width:900px;

background:rgba(255,255,255,.15);

backdrop-filter:blur(12px);

border-radius:30px;

padding:60px;

text-align:center;

color:white;

box-shadow:0 20px 40px rgba(0,0,0,.35);

animation:fade 1.2s;

}

.hero-box h1{

font-size:48px;

margin-bottom:20px;

}

.hero-box h2{

font-size:26px;

font-weight:400;

margin-bottom:25px;

}

.hero-box p{

font-size:18px;

line-height:1.8;

margin-bottom:40px;

}

/* Buttons */

.btn{

display:inline-block;

padding:15px 35px;

margin:10px;

border-radius:50px;

text-decoration:none;

font-size:18px;

font-weight:600;

transition:.4s;

}

.explore{

background:#FFB74D;

color:white;

}

.explore:hover{

background:#FB8C00;

transform:translateY(-5px);

}

.register{

background:#7E57C2;

color:white;

}

.register:hover{

background:#5E35B1;

transform:translateY(-5px);

}

/* Category Cards */

.categories{

margin-top:90px;

display:grid;

grid-template-columns:repeat(4,1fr);

gap:20px;

}

.category{

background:white;

border-radius:20px;

padding:25px;

text-decoration:none;

color:#0D47A1;

transition:.4s;

box-shadow:0 10px 25px rgba(0,0,0,.12);

}

.category:hover{

transform:translateY(-10px);

background:#E3F2FD;

}

.category h3{

margin-top:15px;

font-size:22px;

}

.category p{

margin-top:10px;

font-size:15px;

color:#555;

}

/* Animation */

@keyframes fade{

from{

opacity:0;
transform:translateY(40px);

}

to{

opacity:1;
transform:translateY(0);

}

}

</style>

</head>

<body>

<nav>

<div class="logo">
SKIT Event Portal
</div>

<ul>

<li><a href="index.php">Home</a></li>

<li><a href="about.php">About</a></li>

<li><a href="gallery.php">Gallery</a></li>

<li><a href="contact.php">Contact</a></li>

<li><a href="login.php">Admin</a></li>

</ul>

</nav>

<section class="hero">

<div class="hero-box">

<h1>

Swami Keshvanand Institute of Technology,<br>

Management & Gramothan

</h1>

<h2>

Campus Event Management System

</h2>

<p>

Discover exciting Technical, Cultural, Sports and Workshop events happening at SKIT.
Register online, participate in competitions and showcase your talent.

</p>

<a href="gallery.php" class="btn explore">

Explore Events

</a>

<a href="register.php" class="btn register">

Register Now

</a>

<div class="categories">

<a href="event_details.php?category=Technical" class="category">

<h1>💻</h1>

<h3>Technical</h3>

<p>Coding, Robotics, AI, Hackathons</p>

</a>

<a href="event_details.php?category=Cultural" class="category">

<h1>🎭</h1>

<h3>Cultural</h3>

<p>Dance, Music, Drama & Fashion</p>

</a>

<a href="event_details.php?category=Sports" class="category">

<h1>⚽</h1>

<h3>Sports</h3>

<p>Indoor & Outdoor Competitions</p>

</a>

<a href="event_details.php?category=Workshop" class="category">

<h1>🛠</h1>

<h3>Workshop</h3>

<p>AI, Web Development & IoT</p>

</a>

</div>

</div>

</section>
<!-- ================= ABOUT SECTION ================= -->

<style>

.about{

padding:90px 10%;
background:#FFF7F8;
text-align:center;

}

.about h2{

font-size:42px;
color:#0D47A1;
margin-bottom:25px;

}

.about p{

font-size:18px;
line-height:1.9;
color:#555;
max-width:1000px;
margin:auto;

}

/* Statistics */

.stats{

padding:80px 8%;
background:#EEF7FF;

}

.stats h2{

text-align:center;
font-size:40px;
color:#0D47A1;
margin-bottom:50px;

}

.stat-container{

display:flex;
justify-content:center;
flex-wrap:wrap;
gap:30px;

}

.stat{

width:220px;

background:white;

padding:35px;

border-radius:25px;

box-shadow:0 12px 25px rgba(0,0,0,.12);

transition:.4s;

}

.stat:hover{

transform:translateY(-10px);

background:#BBDEFB;

}

.stat h1{

font-size:55px;
color:#1565C0;

}

.stat p{

font-size:18px;
margin-top:12px;
color:#555;

}

/* Highlights */

.highlights{

padding:90px 8%;
background:#FFFDF5;

}

.highlights h2{

text-align:center;

font-size:40px;

color:#0D47A1;

margin-bottom:50px;

}

.highlight-grid{

display:grid;

grid-template-columns:repeat(auto-fit,minmax(280px,1fr));

gap:30px;

}

.highlight{

background:white;

border-radius:25px;

overflow:hidden;

box-shadow:0 15px 30px rgba(0,0,0,.15);

transition:.4s;

}

.highlight:hover{

transform:translateY(-12px);

}

.highlight img{

width:100%;

height:220px;

object-fit:cover;

}

.highlight h3{

padding:18px;

color:#0D47A1;

}

.highlight p{

padding:0 18px 25px;

color:#555;

line-height:1.7;

}

</style>


<section class="about">

<h2>About SKIT Events</h2>

<p>

Swami Keshvanand Institute of Technology, Management & Gramothan (SKIT), Jaipur organizes various technical, cultural, sports and workshop events throughout the academic year. These events provide students with opportunities to develop leadership qualities, technical expertise, teamwork, creativity and confidence while interacting with industry experts and fellow participants.

</p>

</section>


<section class="stats">

<h2>Our Achievements</h2>

<div class="stat-container">

<div class="stat">

<h1>50+</h1>

<p>Events Organized</p>

</div>

<div class="stat">

<h1>5000+</h1>

<p>Student Participants</p>

</div>

<div class="stat">

<h1>120+</h1>

<p>Workshops Conducted</p>

</div>

<div class="stat">

<h1>25+</h1>

<p>Industry Speakers</p>

</div>

</div>

</section>


<section class="highlights">

<h2>Previous Event Highlights</h2>

<div class="highlight-grid">

<div class="highlight">

<img src="images/technical.jpeg">

<h3>💻 Technical Fest</h3>

<p>

Hackathons, Coding Challenges, Robotics Competition and AI Project Exhibition.

</p>

</div>


<div class="highlight">

<img src="images/cultural.jpeg">

<h3>🎭 Cultural Night</h3>

<p>

Dance performances, Music Bands, Fashion Shows and Talent Hunt.

</p>

</div>


<div class="highlight">

<img src="images/sports.jpeg">

<h3>⚽ Sports Meet</h3>

<p>

Cricket, Football, Volleyball, Athletics and Indoor Championships.

</p>

</div>


<div class="highlight">

<img src="images/workshop.jpeg">

<h3>🛠 Workshops</h3>

<p>

Artificial Intelligence, Web Development, Cyber Security and IoT Sessions.

</p>

</div>

</div>

</section>
<!-- ================= UPCOMING EVENTS ================= -->

<style>

/* Upcoming Events */

.upcoming{

padding:90px 8%;
background:#F9FAFF;

}

.upcoming h2{

text-align:center;
font-size:42px;
color:#0D47A1;
margin-bottom:50px;

}

.event-container{

display:grid;
grid-template-columns:repeat(auto-fit,minmax(300px,1fr));
gap:30px;

}

.event-card{

background:white;
border-radius:20px;
overflow:hidden;
box-shadow:0 15px 30px rgba(0,0,0,.12);
transition:.4s;

}

.event-card:hover{

transform:translateY(-12px);

}

.event-card img{

width:100%;
height:220px;
object-fit:cover;

}

.event-content{

padding:25px;

}

.event-content h3{

color:#0D47A1;
margin-bottom:15px;

}

.event-content p{

color:#555;
line-height:1.8;

}

.register-btn{

display:inline-block;
margin-top:20px;
padding:12px 28px;
background:#7E57C2;
color:white;
text-decoration:none;
border-radius:30px;
font-weight:bold;
transition:.3s;

}

.register-btn:hover{

background:#5E35B1;

}

/* Testimonials */

.testimonials{

padding:90px 8%;
background:#FFF6F6;

}

.testimonials h2{

text-align:center;
font-size:40px;
color:#0D47A1;
margin-bottom:45px;

}

.testimonial-box{

display:flex;
flex-wrap:wrap;
justify-content:center;
gap:30px;

}

.testimonial{

width:320px;
background:white;
padding:30px;
border-radius:20px;
box-shadow:0 10px 25px rgba(0,0,0,.12);

}

.testimonial p{

font-style:italic;
line-height:1.8;
color:#555;

}

.testimonial h4{

margin-top:20px;
color:#0D47A1;

}

</style>


<section class="upcoming">

<h2>Upcoming Events</h2>

<div class="event-container">

<div class="event-card">

<img src="images/technical.jpeg">

<div class="event-content">

<h3>💻 Coding Challenge 2026</h3>

<p>

Date: 25 August 2026<br>

Venue: Computer Centre<br>

Category: Technical

</p>

<a href="register.php?event=Coding Challenge" class="register-btn">

Register Now

</a>

</div>

</div>


<div class="event-card">

<img src="images/cultural.jpeg">

<div class="event-content">

<h3>🎭 Cultural Fiesta</h3>

<p>

Date: 28 August 2026<br>

Venue: Main Auditorium<br>

Category: Cultural

</p>

<a href="register.php?event=Cultural Fiesta" class="register-btn">

Register Now

</a>

</div>

</div>


<div class="event-card">

<img src="images/sports.jpeg">

<div class="event-content">

<h3>⚽ Sports Championship</h3>

<p>

Date: 5 September 2026<br>

Venue: Sports Ground<br>

Category: Sports

</p>

<a href="register.php?event=Sports Championship" class="register-btn">

Register Now

</a>

</div>

</div>

</div>

</section>


<section class="testimonials">

<h2>Student Experiences</h2>

<div class="testimonial-box">

<div class="testimonial">

<p>

"Participating in SKIT Technical Fest improved my coding skills and gave me confidence to compete nationally."

</p>

<h4>- Computer Science Student</h4>

</div>

<div class="testimonial">

<p>

"The Cultural Fest gave me an amazing platform to showcase my dance talent and meet students from different branches."

</p>

<h4>- Cultural Club Member</h4>

</div>

<div class="testimonial">

<p>

"The AI Workshop was one of the best sessions. It helped me understand real-world applications of Artificial Intelligence."

</p>

<h4>- IT Department Student</h4>

</div>

</div>

</section>
<!-- ================= CONTACT SECTION ================= -->

<style>

/* Contact */

.contact-home{

padding:80px 8%;
background:linear-gradient(135deg,#FCE4EC,#E3F2FD);

}

.contact-home h2{

text-align:center;
font-size:40px;
color:#0D47A1;
margin-bottom:40px;

}

.contact-box{

display:flex;
justify-content:center;
flex-wrap:wrap;
gap:30px;

}

.contact-card{

width:280px;

background:white;

padding:30px;

border-radius:20px;

box-shadow:0 12px 25px rgba(0,0,0,.12);

text-align:center;

transition:.4s;

}

.contact-card:hover{

transform:translateY(-10px);

}

.contact-card h3{

margin-bottom:15px;
color:#1565C0;

}

.contact-card p{

color:#555;
line-height:1.8;

}

/* Footer */

footer{

background:#0D47A1;

color:white;

padding:30px;

text-align:center;

}

footer h3{

font-size:26px;

margin-bottom:10px;

}

footer p{

margin:8px 0;

}

.social{

margin-top:20px;

}

.social a{

display:inline-block;

width:45px;

height:45px;

line-height:45px;

border-radius:50%;

background:white;

color:#0D47A1;

text-decoration:none;

font-size:20px;

margin:8px;

transition:.3s;

}

.social a:hover{

background:#FFB74D;

color:white;

transform:scale(1.1);

}

.top-btn{

position:fixed;

bottom:20px;

right:20px;

background:#FF9800;

color:white;

padding:15px 18px;

border-radius:50%;

text-decoration:none;

font-size:20px;

box-shadow:0 8px 20px rgba(0,0,0,.3);

transition:.3s;

}

.top-btn:hover{

background:#F57C00;

}

@media(max-width:768px){

.hero-box h1{

font-size:34px;

}

.hero-box h2{

font-size:20px;

}

.categories{

grid-template-columns:repeat(2,1fr);

}

nav{

padding:15px;

flex-direction:column;

}

nav ul{

margin-top:15px;

flex-wrap:wrap;

justify-content:center;

}

nav ul li{

margin:8px;

}

}

@media(max-width:550px){

.categories{

grid-template-columns:1fr;

}

.hero-box{

padding:30px;

}

}

</style>

<section class="contact-home">

<h2>Contact Us</h2>

<div class="contact-box">

<div class="contact-card">

<h3>📍 Address</h3>

<p>

Swami Keshvanand Institute of Technology,<br>

Management & Gramothan,<br>

Jagatpura, Jaipur

</p>

</div>

<div class="contact-card">

<h3>📞 Phone</h3>

<p>

+91-141-3500300

</p>

</div>

<div class="contact-card">

<h3>📧 Email</h3>

<p>

info@skit.ac.in

</p>

</div>

</div>

</section>

<footer>

<h3>SKIT Campus Event Management System</h3>

<p>

Connecting Students Through Innovation, Culture & Sports

</p>

<p>

Developed by <b>Akansha Sharma</b>

</p>

<p>

© 2026 All Rights Reserved

</p>

<div class="social">

<a href="#">📘</a>

<a href="#">📷</a>

<a href="#">▶️</a>

<a href="#">💼</a>

</div>

</footer>

<a href="#" class="top-btn">↑</a>

</body>
</html>