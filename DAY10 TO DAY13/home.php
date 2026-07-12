<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Student Portal Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial,sans-serif;
}

    .navbar{
    background:rgba(13,110,253,0.9);
    backdrop-filter:blur(10px);
    box-shadow:0 5px 15px rgba(0,0,0,.3);
}


.navbar-brand{
    font-size:28px;
    font-weight:bold;
}

.nav-link{
    color:white !important;
    font-size:18px;
    margin-left:15px;
}

.nav-link:hover{
    color:yellow !important;
}


    .hero{
    background:
    linear-gradient(rgba(8,20,40,0.75),rgba(8,20,40,0.75)),
    url("https://images.unsplash.com/photo-1541339907198-e08756dedf3f?auto=format&fit=crop&w=1600&q=80");

    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;

    height:90vh;

    display:flex;
    justify-content:center;
    align-items:center;
    text-align:center;

    color:white;
}


.hero h1{
    font-size:65px;
    font-weight:800;
    text-shadow:3px 3px 10px rgba(0,0,0,.5);
}

.hero p{
    font-size:24px;
    text-shadow:2px 2px 8px rgba(0,0,0,.5);
}

.section-title{
    font-weight:bold;
    margin-bottom:40px;
}

.card{
    border:none;
    border-radius:15px;
    transition:.3s;
}

.card:hover{
    transform:translateY(-10px);
    box-shadow:0px 10px 20px rgba(0,0,0,.3);
}

footer{
    background:#212529;
    color:white;
    padding:20px;
}
.btn-warning,
.btn-success{
    border-radius:50px;
    padding:12px 35px;
    font-size:18px;
    font-weight:bold;
    transition:.3s;
}

.btn-warning:hover,
.btn-success:hover{
    transform:translateY(-4px);
}
</style>

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark">

<div class="container">


   <a class="navbar-brand d-flex align-items-center" href="home.php">
    <img src="logo.png" alt="Logo" width="60" height="60" class="rounded-circle me-2">

    <span class="text-white fw-bold fs-4">
        Student Portal
    </span>
</a>


<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="home.php">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#about">About</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#features">Features</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#contact">Contact</a>
</li>

<li class="nav-item ms-2">
<a href="register.php" class="btn btn-warning">
Register
</a>
</li>

<li class="nav-item ms-2">
<a href="login.php" class="btn btn-success">
Login
</a>
</li>

</ul>

</div>

</div>

</nav>

<!-- Hero -->

<section class="hero">

<div class="container">

<h1>Student Portal Management System</h1>

<p class="mt-3">

A Complete Role-Based Login System for
Students, Teachers, Admins and Super Admins.

</p>

<div class="mt-4">

<a href="register.php" class="btn btn-warning btn-lg me-3">

Register Now

</a>

<a href="login.php" class="btn btn-success btn-lg">

Login

</a>

</div>

</div>

</section>

<!-- About -->

<section id="about" class="container py-5">

<h2 class="text-center section-title">

About Us

</h2>

<p class="text-center fs-5">

This portal is used for student registration and differant login options as teacher ,admin
and superadmin along with student login

</p>

</section>

<!-- Features -->

<section id="features" class="bg-light py-5">

<div class="container">

<h2 class="text-center section-title">

Portal Features

</h2>

<div class="row g-4">

<div class="col-md-3">

<div class="card p-4 text-center">

<h1>👨‍🎓</h1>

<h4>Student</h4>

<p>

Register, Login,
Update Profile,
Change Password.

</p>

</div>

</div>

<div class="col-md-3">

<div class="card p-4 text-center">

<h1>👨‍🏫</h1>

<h4>Teacher</h4>

<p>

Teacher Dashboard
View Registered Users

</p>

</div>

</div>

<div class="col-md-3">

<div class="card p-4 text-center">

<h1>👨‍💼</h1>

<h4>Admin</h4>

<p>

Manage Students
Monitor Records

</p>

</div>

</div>

<div class="col-md-3">

<div class="card p-4 text-center">

<h1>👑</h1>

<h4>Super Admin</h4>

<p>

Edit Users
Delete Users
Manage Roles

</p>

</div>

</div>

</div>

</div>

</section>

<!-- Contact -->

<section id="contact" class="container py-5">

<h2 class="text-center section-title">

Contact Us

</h2>

<div class="text-center">

<p><strong>Email:</strong> support@studentportal.com</p>

<p><strong>Phone:</strong> +91 9876543210</p>

<p><strong>Address:</strong> Jaipur, Rajasthan, India</p>

</div>

</section>

<footer class="text-center">

<p class="mb-0">

© 2026 Student Portal Management System

<br>

Developed by <strong>Ishika Vijay</strong>

</p>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>