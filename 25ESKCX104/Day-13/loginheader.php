<?php
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ticket Booking System</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

.container{

    width:100%;
    background:linear-gradient(90deg,#007bff,#00c6ff);
    box-shadow:0 2px 10px rgba(0,0,0,.2);

}

.navbar{

    width:90%;
    margin:auto;
    display:flex;
    justify-content:space-between;
    align-items:center;
    height:70px;

}

.logo a{

    color:white;
    font-size:28px;
    font-weight:bold;
    text-decoration:none;

}

.nav-list{

    list-style:none;
    display:flex;
    gap:30px;
    align-items:center;

}

.nav-link{

    text-decoration:none;
    color:white;
    font-size:17px;
    font-weight:500;
    padding:8px 12px;
    border-radius:5px;
    transition:.3s;

}

.nav-link:hover{

    background:white;
    color:#007bff;

}

.user{

    color:white;
    font-weight:bold;
}

@media(max-width:768px){

.navbar{

flex-direction:column;
height:auto;
padding:15px;

}

.nav-list{

flex-direction:column;
margin-top:15px;
gap:15px;

}

}

</style>

</head>

<body>

<div class="container">

<nav class="navbar">

<div class="logo">

<a href="index.php">

🎟 Ticket Booking

</a>

</div>

<ul class="nav-list">

<li><a href="index.php" class="nav-link">🏠 Home</a></li>

<li><a href="about.php" class="nav-link">ℹ About</a></li>

<li><a href="service.php" class="nav-link">🎫 Services</a></li>

<li><a href="contact.php" class="nav-link">📞 Contact</a></li>

<li><a href="events.php" class="nav-link">🎭 Events</a></li>

<li><a href="my_bookings.php" class="nav-link">📖 My Bookings</a></li>

<li><a href="profile.php" class="nav-link">👤 Profile</a></li>

<li><a href="logout.php" class="nav-link">🚪 Logout</a></li>

<?php
if(isset($_SESSION["fullname"])){
?>

<li class="user">

👋 <?php echo $_SESSION["fullname"]; ?>

</li>

<?php
}
?>

</ul>

</nav>

</div>

</body>
</html>