<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Industrial Training Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.navbar{
    background:#d9f5ef;
    box-shadow:0 2px 8px rgba(0,0,0,.15);
}

.logo{
    width:70px;
    height:70px;
    border-radius:50%;
    object-fit:cover;
}

.nav-link{
    font-weight:600;
    color:#222!important;
}

.nav-link:hover{
    color:#0d6efd!important;
}

.dropdown-menu{
    min-width:170px;
}
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg">

<div class="container-fluid px-4">

<a class="navbar-brand d-flex align-items-center" href="index.php">

<img src="Logo.jpeg" class="logo me-2">

<div>
<h5 class="mb-0 fw-bold text-success">
Industrial Training
</h5>
<small class="text-muted">
Management System
</small>
</div>

</a>

<button class="navbar-toggler" type="button"
data-bs-toggle="collapse"
data-bs-target="#navbar">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="navbar">

<ul class="navbar-nav ms-auto align-items-center">

<li class="nav-item mx-3">
<a class="nav-link" href="index.php">Home</a>
</li>

<li class="nav-item mx-3">
<a class="nav-link" href="about.php">About us</a>
</li>

<li class="nav-item mx-3">
<a class="nav-link" href="contact.php">Contact us</a>
</li>

<li class="nav-item dropdown mx-3">

<a class="nav-link dropdown-toggle btn btn-primary text-white px-3 rounded"
href="#"
role="button"
data-bs-toggle="dropdown">

Login

</a>

<ul class="dropdown-menu dropdown-menu-end">

<li>
<a class="dropdown-item" href="adminLogin.php">
👨‍💼 Admin Login
</a>
</li>

<li>
<a class="dropdown-item" href="login.php">
👨‍🎓 User Login
</a>
</li>

</ul>

</li>

</ul>

</div>

</div>

</nav>