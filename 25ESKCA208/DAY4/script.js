<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>CodeNova Landing Page</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">

<a class="navbar-brand" href="#">CodeNova</a>

<button class="navbar-toggler" type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarNav">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navbarNav">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link active" href="#">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#about">About</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#features">Features</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#team">Team</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#contact">Contact</a>
</li>

</ul>

</div>

</div>
</nav>

<div class="container hero mt-5">

<div class="row align-items-center">

<div class="col-md-6">

<h1 class="display-4 fw-bold">
Learn. Build. Grow.
</h1>

<p class="lead">
Become a Full Stack Developer with practical projects and expert mentors.
</p>

<button class="btn btn-primary me-3">
Get Started
</button>

<button class="btn btn-outline-primary">
Learn More
</button>

</div>

<div class="col-md-6 text-center">

<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRK_HvhXiohMhiG1C27z7f2Q5VnlAnvsOHWghKgpHEPow&s=10"
class="img-fluid rounded shadow">

</div>

</div>

</div>

<section id="features" class="container mt-5">

<h2 class="text-center mb-4">
Our Features
</h2>

<div class="row">
    <div class="col-md-4 mb-4">
<div class="card h-100">
<img src="IMAGE/images.jpg" class="card-img-top" style="height:200px;object-fit:cover;">
<div class="card-body">
<h5 class="card-title">Live Projects</h5>
<p class="card-text">
Work on real-world projects to gain practical experience and improve your coding skills.
</p>
<a href="#" class="btn btn-primary">Read More</a>
</div>
</div>
</div>

<div class="col-md-4 mb-4">
<div class="card h-100">
<img src="IMAGE/mentors.jpg" class="card-img-top" style="height:200px;object-fit:cover;">
<div class="card-body">
<h5 class="card-title">Expert Mentors</h5>
<p class="card-text">
Learn from experienced developers who guide you throughout your journey.
</p>
<a href="#" class="btn btn-primary">Read More</a>
</div>
</div>
</div>

<div class="col-md-4 mb-4">
<div class="card h-100">
<img src="IMAGE/cetificate.webp" class="card-img-top" style="height:200px;object-fit:cover;">
<div class="card-body">
<h5 class="card-title">Certification</h5>
<p class="card-text">
Receive an industry-recognised certificate after successful course completion.
</p>
<a href="#" class="btn btn-primary">Read More</a>
</div>
</div>
</div>

</div>

</section>

<section id="team" class="container mt-5">

<h2 class="text-center mb-4">
Meet Our Team
</h2>

<div class="row">

<div class="col-md-3 mb-4">
<div class="card text-center h-100">
<img src="IMAGE/images (1).jpg"
class="rounded-circle mx-auto mt-3"
style="width:150px;height:150px;">
<div class="card-body">
<h5>Frontend Developer</h5>
<p>Creates responsive and user-friendly websites.</p>
</div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card text-center h-100">
<img src="IMAGE/images (2).jpg"
class="rounded-circle mx-auto mt-3"
style="width:150px;height:150px;">
<div class="card-body">
<h5>Backend Developer</h5>
<p>Builds secure server-side applications.</p>
</div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card text-center h-100">
<img src="IMAGE/pp2.webp"
class="rounded-circle mx-auto mt-3"
style="width:150px;height:150px;">
<div class="card-body">
<h5>UI/UX Designer</h5>
<p>Designs clean and attractive interfaces.</p>
</div>
</div>
</div>

<div class="col-md-3 mb-4">
<div class="card text-center h-100">
<img src="IMAGE/pp2.webp"
class="rounded-circle mx-auto mt-3"
style="width:150px;height:150px;">
<div class="card-body">
<h5>Project Manager</h5>
<p>Leads the team and ensures successful delivery.</p>
</div>
</div>
</div>

</div>

</section>
<section id="contact" class="container mt-5">

<h2 class="text-center mb-4">
Contact Us
</h2>

<div class="row justify-content-center">

<div class="col-md-8">

<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" class="form-control" id="name" placeholder="Enter your name">
</div>

<div class="mb-3">
<label class="form-label">Email Address</label>
<input type="email" class="form-control" id="email" placeholder="name@gmail.com">
</div>

<div class="mb-3">
<label class="form-label">Phone Number</label>
<input type="text" class="form-control" placeholder="9876543210">
</div>

<div class="mb-3">
<label class="form-label">Message</label>
<textarea class="form-control" rows="4"></textarea>
</div>

<button class="btn btn-primary" onclick="validateForm()">
Submit
</button>

<p id="greeting" class="text-success mt-3 fw-bold"></p>

</div>

</div>

</section>

<footer class="bg-dark text-white mt-5 py-4">

<div class="container">

<div class="row">

<div class="col-md-4">
<h4>CodeNova</h4>
<p>
Building future developers with modern web technologies.
</p>
</div>

<div class="col-md-4">
<h5>Quick Links</h5>
<p><a href="#" class="text-white text-decoration-none">Home</a></p>
<p><a href="#features" class="text-white text-decoration-none">Features</a></p>
<p><a href="#team" class="text-white text-decoration-none">Team</a></p>
<p><a href="#contact" class="text-white text-decoration-none">Contact</a></p>
</div>

<div class="col-md-4">
<h5>Contact Info</h5>
<p>Email: info@codenova.com</p>
<p>Phone: +91 9477777777</p>
<p>Jaipur, Rajasthan</p>
</div>

</div>

<hr>

<p class="text-center mb-0">
© 2026 CodeNova. All Rights Reserved.
</p>

</div>

</footer>

<script src="script.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>