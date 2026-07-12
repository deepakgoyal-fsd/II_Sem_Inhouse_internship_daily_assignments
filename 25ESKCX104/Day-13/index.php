<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Booking system</title>
    <style>
        *{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}
body{
    background:#f4f4f4;
}
.hero{
    height:90vh;
    background:linear-gradient(rgba(0,0,0,.6),rgba(0,0,0,.6)),
    url("images/background.jpg");
    background-size:cover;
    background-position:center;
    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;
}
.hero-content{
    color:white;
}
.hero-content h1{
    font-size:55px;
    margin-bottom:20px;
}
.hero-content p{
    font-size:22px;
    margin-bottom:30px;
}
.hero-content a{
    text-decoration:none;
    padding:12px 25px;
    background:#007bff;
    color:white;
    border-radius:6px;
    margin:10px;
    transition:.3s;
}
.hero-content a:hover{
    background:#0056b3;
}
.about{
    width:90%;
    margin:60px auto;
    text-align:center;
}
.about h2{
    margin-bottom:20px;
    color:#333;
}
.about p{
    font-size:18px;
    line-height:1.7;
    color:#555;
}
.services{
    width:90%;
    margin:50px auto;
    display:flex;
    justify-content:space-between;
    flex-wrap:wrap;
}
.card{
    width:30%;
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 0 10px rgba(0,0,0,.15);
    text-align:center;
    transition:.3s;
}
.card:hover{
    transform:translateY(-10px);
}
.card h3{
    margin-bottom:15px;
}
.card p{
    color:#666;
}
@media(max-width:768px){
.card{
width:100%;
margin-bottom:20px;
}
.hero-content h1{
font-size:40px;
}
}
.hero{

height:500px;

background:linear-gradient(to right,#007bff,#00c6ff);

display:flex;

flex-direction:column;

justify-content:center;

align-items:center;

color:white;

text-align:center;

}

.hero h1{

font-size:55px;

margin-bottom:20px;

}

.hero p{

font-size:22px;

margin-bottom:25px;

}

.hero button{

padding:15px 35px;

font-size:18px;

border:none;

border-radius:8px;

background:white;

color:#007bff;

cursor:pointer;

font-weight:bold;

}

.hero button:hover{

background:#f2f2f2;

}
.about{

padding:70px;

text-align:center;

}

.features{

display:flex;

justify-content:center;

gap:30px;

margin-top:40px;

flex-wrap:wrap;

}

.feature{

width:300px;

background:white;

padding:25px;

border-radius:10px;

box-shadow:0 0 10px gray;

transition:.3s;

}

.feature:hover{

transform:translateY(-8px);

}
    </style>
</head>
<body>
    <section class="hero">
        <div class="hero-content">
            <h1>Welcome to Ticket Booking System</h1>
            <p>Book Tickets Anytime, Anywhere.</p>
            <a href="registration.php">Register</a>
            <a href="login.php">Login</a>
            <a href="admin_login.php">Admin Login</a>
        </div>
    </section>
    <section class="about">
        <h2>About Us</h2>
    <p>Our Ticket Booking System provides an easy and secure way to book tickets online.
    Users can register, log in, view available events, and book tickets in just a few clicks.
    </p>
    </section>
    <section class="hero">

<h1>Welcome To Ticket Booking System</h1>

<p>

Book Movie, Concert, Sports and Event Tickets Easily

</p>

<a href="events.php">

<button>

Explore Events

</button>

</a>

</section>

    <section class="services">
        <div class="card">
            <h3> Easy Booking</h3>
            <p>Book tickets quickly and securely.</p>
        </div>
        <div class="card">
            <h3> Fast Service</h3>
            <p>Simple and user-friendly interface.  </p>
        </div>
        <div class="card">
            <h3> Secure Payment</h3>
            <p>Your booking information remains safe.</p>
        </div>
    </section>
</body>
</html>
<?php
include("footer.php");
?>