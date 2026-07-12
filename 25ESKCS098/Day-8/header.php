<!DOCTYPE html>
<html>

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Student Registration System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand" href="index.php">

Student Portal

</a>

<button
class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#menu">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse" id="menu">

<ul class="navbar-nav ms-auto">

<li class="nav-item">

<a class="nav-link <?php if(isset($page) && $page=="home") echo "active"; ?>"
href="index.php">

Home

</a>

</li>

<li class="nav-item">

<a class="nav-link <?php if(isset($page) && $page=="register") echo "active"; ?>"
href="index.php">

Register

</a>

</li>

<li class="nav-item">

<a class="nav-link <?php if(isset($page) && $page=="about") echo "active"; ?>"
href="#">

About

</a>

</li>

</ul>

</div>

</div>

</nav>

<div class="container mt-4">