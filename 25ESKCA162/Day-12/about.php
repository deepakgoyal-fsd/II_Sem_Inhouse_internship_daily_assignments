<?php
session_start();

if (isset($_SESSION['user_id'])) {
    include 'dashboardheader.php';
    include 'header.php';
} else {
    include 'logindashboard.php';
}
?>

<div class="about-section">
    <!-- Your About page content -->
</div>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>About Us</title>

<style>
body{
    margin:0;
    font-family:Arial, Helvetica, sans-serif;
    background:#f4f7fc;
}

.about-section{
    max-width:1100px;
    margin:50px auto;
    padding:20px;
}

.about-card{
    background:#fff;
    border-radius:15px;
    padding:40px;
    box-shadow:0 8px 20px rgba(0,0,0,0.15);
}

.about-card h1{
    text-align:center;
    color:#0d6efd;
    margin-bottom:15px;
}

.about-card p{
    font-size:17px;
    line-height:1.8;
    color:#444;
    text-align:justify;
}

.features{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
    gap:20px;
    margin-top:35px;
}

.feature-box{
    background:#f8f9fa;
    border-left:5px solid #0d6efd;
    border-radius:10px;
    padding:20px;
    transition:.3s;
}

.feature-box:hover{
    transform:translateY(-5px);
    box-shadow:0 8px 15px rgba(0,0,0,.15);
}

.feature-box h3{
    color:#0d6efd;
    margin-bottom:10px;
}

.feature-box p{
    margin:0;
    font-size:15px;
    text-align:left;
}

.mission{
    margin-top:40px;
    background:#0d6efd;
    color:#fff;
    border-radius:12px;
    padding:25px;
}

.mission h2{
    margin-bottom:10px;
}

.mission p{
    color:#fff;
    text-align:justify;
}

.footer-space{
    margin-bottom:40px;
}
</style>

</head>
<body>

<div class="about-section">

<div class="about-card">

<h1>About Industrial Training Management System</h1>

<p>
The <strong>Industrial Training Management System (ITMS)</strong> is a web-based application developed to simplify the management of industrial training activities for students and administrators. The system provides an easy, secure and efficient platform where students can register, manage their profiles and submit their training information online.
</p>

<p>
The primary objective of this project is to reduce paperwork, improve data accuracy and make student information easily accessible. The system offers a user-friendly interface, making it simple for students to complete their registration and for administrators to manage records efficiently.
</p>

<div class="features">

<div class="feature-box">
<h3>Student Registration</h3>
<p>Students can register by providing personal, academic and training details through an online form.</p>
</div>

<div class="feature-box">
<h3>Secure Login</h3>
<p>User authentication ensures that only authorized users can access the system and manage their information.</p>
</div>

<div class="feature-box">
<h3>Profile Management</h3>
<p>Students can update their details, change passwords and maintain accurate records.</p>
</div>

<div class="feature-box">
<h3>Admin Management</h3>
<p>Administrators can manage student records, verify information and monitor the complete training process.</p>
</div>

<div class="feature-box">
<h3>Digital Record Keeping</h3>
<p>All student information is stored digitally, reducing paperwork and improving accessibility.</p>
</div>

<div class="feature-box">
<h3>Easy to Use</h3>
<p>The application provides a clean, responsive and user-friendly interface for a better user experience.</p>
</div>

</div>

<div class="mission">
<h2>Our Mission</h2>

<p>
Our mission is to provide a modern, reliable and secure Industrial Training Management System that improves communication between students and administrators while making the training management process faster, easier and completely digital.
</p>

</div>

</div>

<div class="footer-space"></div>

</div>

<?php include 'footer.php'; ?>

</body>
</html>