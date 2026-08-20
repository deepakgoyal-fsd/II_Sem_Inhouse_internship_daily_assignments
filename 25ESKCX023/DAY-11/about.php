<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>College Assignment</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
<style>
    body{
background:#f8f9fa;
}

.hero{
background:#6f42c1;
color:white;
padding:80px 20px;
text-align:center;
}

.card img{
height:250px;
object-fit:cover;
}

footer{
background:#212529;
color:white;
padding:20px;
text-align:center;
margin-top:50px;
}
</style>
</head>
<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">/

<a class="navbar-brand" href="#">My Website</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarNav">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link active" href="#">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#services">Services</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#team">Our Team</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#">Contact</a>
</li>

</ul>

</div>

</div>
</nav>

<!-- Hero Section -->

<section class="hero">

<div class="container">

<h1>Welcome to Our Website</h1>

<p class="lead">
We provide quality services with an amazing team.
</p>

<a href="#services" class="btn btn-light mt-3">Explore</a>

</div>

</section>

<!-- Services -->

<section id="services" class="container py-5">

<h2 class="text-center mb-5">Our Services</h2>

<div class="row">

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h4>Web Design</h4>

<p>
Modern and responsive website designs using Bootstrap.
</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h4>Development</h4>

<p>
Fast and reliable website development solutions.
</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<div class="card-body text-center">

<h4>Support</h4>

<p>
24/7 customer support for all your technical needs.
</p>

</div>

</div>

</div>

</div>

</section>

<!-- Team -->

<section id="team" class="container py-5">

<h2 class="text-center mb-5">Our Team</h2>

<div class="row">

<div class="col-md-4">

<div class="card shadow">

<img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=500" class="card-img-top">

<div class="card-body text-center">

<h4>Alice</h4>

<p>Frontend Developer</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=500" class="card-img-top">

<div class="card-body text-center">

<h4>John</h4>

<p>Backend Developer</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card shadow">

<img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=500" class="card-img-top">

<div class="card-body text-center">

<h4>Emma</h4>

<p>UI/UX Designer</p>

</div>

</div>

</div>

</div>

</section>

<footer>

<p>© 2026 My Website | College Assignment</p>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>