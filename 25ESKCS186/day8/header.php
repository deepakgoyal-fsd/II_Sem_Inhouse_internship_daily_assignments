<!DOCTYPE html>

<html>

<head>

<title>Website</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"

rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

<div class="container">

<a class="navbar-brand"

href="#">

My Website

</a>

<div>

<ul class="navbar-nav">

<li class="nav-item">

<a class="nav-link <?php if($page=="home") echo "active"; ?>"

href="index.php">

Home

</a>

</li>

<li class="nav-item">

<a class="nav-link <?php if($page=="about") echo "active"; ?>"

href="#">

About

</a>

</li>

<li class="nav-item">

<a class="nav-link <?php if($page=="contact") echo "active"; ?>"

href="#">

Contact

</a>

</li>

</ul>

</div>

</div>

</nav>

<div class="container mt-4">