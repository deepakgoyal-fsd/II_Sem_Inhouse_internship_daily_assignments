<?php
if (!isset($page)) {
    $page = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>

<body style="background:#f4f6f9;">

<nav class="navbar navbar-expand-lg navbar-dark"
style="background:linear-gradient(to right,#0d6efd,#6610f2);">

<div class="container">

<a class="navbar-brand fw-bold" href="index.php">

<i class="fa-solid fa-user-graduate"></i>

Student Registration

</a>

<button class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#navbarNav">

<span class="navbar-toggler-icon"></span>

</button>

<div class="collapse navbar-collapse"
id="navbarNav">

<ul class="navbar-nav ms-auto">

<li class="nav-item">

<a class="nav-link <?php if($page=="home") echo "active";?>"
href="index.php">

<i class="fa-solid fa-house"></i>

Home

</a>

</li>

<li class="nav-item">

<a class="nav-link <?php if($page=="register") echo "active";?>"
href="index.php">

<i class="fa-solid fa-pen"></i>

Register

</a>

</li>

<li class="nav-item">

<a class="nav-link <?php if($page=="about") echo "active";?>"
href="#">

<i class="fa-solid fa-circle-info"></i>

About

</a>

</li>

</ul>

</div>

</div>

</nav>

<div class="container mt-5">