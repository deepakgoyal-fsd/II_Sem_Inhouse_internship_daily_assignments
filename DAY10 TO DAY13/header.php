<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Student Login System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
    min-height:100vh;
}

.navbar{
    box-shadow:0 3px 10px rgba(0,0,0,.4);
}

.nav-link{
    color:white !important;
    font-weight:500;
}

.nav-link:hover{
    color:#ffc107 !important;
}

.card{
    border-radius:15px;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<!-- Logo -->
<a class="navbar-brand fw-bold" href="register.php">
    <img src="logo.png" alt="logo" width="80">
</a>

<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarNav">

<ul class="navbar-nav ms-auto">

<li class="nav-item">
<a class="nav-link" href="register.php">Home</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#about">About</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#contact">Contact</a>
</li>

<li class="nav-item">
<a class="btn btn-success ms-2" href="register.php">
Register
</a>
</li>

<li class="nav-item">
<a class="btn btn-warning ms-2" href="login.php">
Login
</a>
</li>

</ul>

</div>

</div>

</nav>

<div class="container mt-5">