<?php

$email = "";
$message = "";
$status = "";

$username = "";
$domain = "";
$extension = "";

if(isset($_POST['validate'])){

    $email = trim($_POST['email']);

    if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        $message = "✅ Valid Email Format";
        $status = "valid";


        $parts = explode("@",$email);

        $username = $parts[0];

        $domain = $parts[1];


        $extension = pathinfo($domain, PATHINFO_EXTENSION);


    }
    else{

        $message = "❌ Invalid Email Format";
        $status = "invalid";

    }

}

?>


<!DOCTYPE html>

<html lang="en">


<head>


<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>
Email Validator Pro
</title>


<!-- Google Font -->

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">


<!-- Bootstrap Icons -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


<!-- Main CSS -->

<link rel="stylesheet" href="style.css">


</head>



<body>



<!-- ===========================
        NAVBAR
=========================== -->


<nav class="navbar">


<div class="brand">


<div class="logo-mini">

<i class="bi bi-search"></i>

<i class="bi bi-envelope-fill"></i>

</div>


<h2>
Email Validator Pro
</h2>


</div>



<div class="nav-links">


<a href="#">
Home
</a>


<a href="#analysis">
Analysis
</a>


<a href="#about">
About
</a>


</div>


</nav>





<!-- ===========================
        MAIN CONTAINER
=========================== -->


<div class="container">



<div class="card">

<!-- ==========================
        NAVIGATION BAR
========================== -->

<nav class="navbar">

    <a href="index.php">
        🏠 Validator
    </a>

    <a href="history.php">
        📜 History
    </a>

    <a href="stats.php">
        📊 Statistics
    </a>

</nav>




<!-- ===========================
        HERO SECTION
=========================== -->


<div class="hero">



<div class="main-logo">


<i class="bi bi-search"></i>


</div>



<h1>

Email Validator Pro

</h1>



<p class="subtitle">

Smart email format checking and analysis system

</p>


</div>






<!-- ===========================
        VALIDATOR FORM
=========================== -->


<form method="POST" id="emailForm">



<div class="input-group">


<input

type="email"

name="email"

id="email"

placeholder="Enter your email address"

value="<?php echo htmlspecialchars($email); ?>"

autocomplete="off"

>


</div>





<div class="buttons">


<button type="submit" name="validate">


<i class="bi bi-check-circle"></i>

Validate Email


</button>



<button type="reset" id="resetBtn">


<i class="bi bi-arrow-clockwise"></i>

Reset


</button>



</div>



</form>





<!-- LIVE VALIDATION MESSAGE -->


<div id="liveMessage">


<?php echo $message; ?>


</div>





<!-- PHP RESULT -->

<?php if($message!=""){ ?>


<div class="result <?php echo $status; ?>">


<h2>

<?php echo $message; ?>

</h2>



<?php if($status=="valid"){ ?>


<table>


<tr>

<td>Email</td>

<td>

<?php echo htmlspecialchars($email); ?>

</td>

</tr>



<tr>

<td>Username</td>

<td>

<?php echo htmlspecialchars($username); ?>

</td>

</tr>



<tr>

<td>Domain</td>

<td>

<?php echo htmlspecialchars($domain); ?>

</td>

</tr>



<tr>

<td>Extension</td>

<td>

<?php echo htmlspecialchars($extension); ?>

</td>

</tr>



</table>


<?php } ?>


</div>



<?php } ?>


<!-- ===========================
        EMAIL ANALYSIS DASHBOARD
=========================== -->


<div id="analysis" class="analysis">



<h2>

<i class="bi bi-bar-chart-fill"></i>

Email Analysis Dashboard

</h2>




<table>


<tr>

<td>
Email Address
</td>

<td id="showEmail">

<?php echo $email=="" ? "-" : htmlspecialchars($email); ?>

</td>

</tr>



<tr>

<td>
Username
</td>

<td id="showUsername">

<?php echo $username=="" ? "-" : htmlspecialchars($username); ?>

</td>

</tr>




<tr>

<td>
Domain
</td>

<td id="showDomain">

<?php echo $domain=="" ? "-" : htmlspecialchars($domain); ?>

</td>

</tr>




<tr>

<td>
Extension
</td>

<td id="showExtension">

<?php echo $extension=="" ? "-" : htmlspecialchars($extension); ?>

</td>

</tr>




<tr>

<td>
Provider
</td>

<td id="showProvider">

-

</td>

</tr>




<tr>

<td>
Total Characters
</td>

<td id="showCharacters">

-

</td>

</tr>




<tr>

<td>
Username Length
</td>

<td id="showUserLength">

-

</td>

</tr>




<tr>

<td>
Domain Length
</td>

<td id="showDomainLength">

-

</td>

</tr>




<tr>

<td>
Validation Status
</td>

<td id="showStatus">


<span class="badge-danger">

Waiting...

</span>


</td>

</tr>



</table>


</div>







<!-- ===========================
        EMAIL QUALITY METER
=========================== -->


<div class="quality-box">


<h2>

<i class="bi bi-shield-check"></i>

Email Quality Score

</h2>



<div class="progress-container">


<div class="progress-bar" id="qualityBar">

</div>


</div>



<h3 id="qualityText">

Waiting for analysis...

</h3>



<p>

Quality depends on:

</p>



<ul>


<li>

✔ Correct email structure

</li>


<li>

✔ Strong username format

</li>


<li>

✔ Valid domain extension

</li>


<li>

✔ Trusted email provider

</li>


</ul>



</div>






<!-- ===========================
        SECURITY SCORE
=========================== -->


<div class="security-card">


<h2>

<i class="bi bi-lock-fill"></i>

Security Check

</h2>



<div class="security-score">


<span id="securityScore">

0%

</span>


</div>



<p id="securityText">

Enter an email to calculate security score.

</p>



</div>

<!-- ===========================
        VALIDATION HISTORY
=========================== -->


<div class="history">


<h2>

<i class="bi bi-clock-history"></i>

Recent Validation History

</h2>



<table>


<tr>

<td>

example@gmail.com

</td>


<td>

<span class="badge-success">

Valid

</span>

</td>


</tr>



<tr>

<td>

wrong@email

</td>


<td>

<span class="badge-danger">

Invalid

</span>

</td>


</tr>



<tr>

<td>

student@yahoo.com

</td>


<td>

<span class="badge-success">

Valid

</span>

</td>


</tr>



</table>



</div>






<hr>







<!-- ===========================
        EMAIL SECURITY TIPS
=========================== -->


<div class="info-box">


<h2>

<i class="bi bi-shield-lock-fill"></i>

Email Security Tips

</h2>



<ul>


<li>

Never share your email password with anyone.

</li>



<li>

Use a strong password with numbers and special characters.

</li>



<li>

Enable two-factor authentication for better security.

</li>



<li>

Avoid opening suspicious links from unknown emails.

</li>



<li>

Always verify the sender before replying.

</li>



</ul>



</div>







<hr>







<!-- ===========================
        HOW IT WORKS
=========================== -->


<div class="info-box">


<h2>

<i class="bi bi-gear-fill"></i>

How This Validator Works

</h2>



<p>


This system checks the structure of an email address using frontend and backend technologies.



<br><br>



The validator checks:



</p>



<ul>


<li>

✔ Presence of exactly one @ symbol

</li>



<li>

✔ Username before @ symbol

</li>



<li>

✔ Valid domain name

</li>



<li>

✔ Correct email extension

</li>



<li>

✔ Invalid characters and spaces

</li>



</ul>



</div>







<hr>







<!-- ===========================
        ABOUT PROJECT
=========================== -->


<div id="about" class="about-section">


<h2>

<i class="bi bi-code-slash"></i>

About This Project

</h2>



<p>


Email Validator Pro is a smart web-based application developed using:



<br><br>



<b>

HTML

</b>

for structure,

<b>

CSS

</b>

for futuristic design,

<b>

JavaScript

</b>

for live validation,

and

<b>

PHP

</b>

for backend processing.



<br><br>



The main purpose of this project is to analyze email formats and help users identify invalid email addresses quickly.



</p>



</div>

<!-- ===========================
        THEME TOGGLE
=========================== -->


<button id="themeBtn" class="theme-btn">

<i class="bi bi-moon-stars-fill"></i>

Dark Mode

</button>






<!-- ===========================
        FOOTER
=========================== -->


<footer>


<div class="footer-content">


<h3>

<i class="bi bi-search-heart"></i>

Email Validator Pro

</h3>



<p>

A smart email format checking and analysis system.

</p>



<p>

Created for College Project

</p>



<p>

© 2026 All Rights Reserved

</p>


</div>



</footer>





</div>

</div>






<!-- ===========================
        JAVASCRIPT
=========================== -->


<script src="script.js"></script>



</body>


</html>