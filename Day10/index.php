<!DOCTYPE html>
<html>
<head>
<title>Student Registration</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<header>

<nav>

<ul>

<li><a href="#">Home</a></li>
<li><a href="#">About us</a></li>
<li><a href="#">Contact us</a></li>

</ul>

</nav>

<div class="btn">
<a href="login.php">Login</a>
</div>

</header>

<section class="container">

<div class="register">

<h1>Register</h1>

<form action="insert.php" method="POST">

<input type="text" name="name" placeholder="Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="password" name="password" placeholder="Password" required>

<input type="password" name="confirm" placeholder="Confirm Password" required>

<button type="submit">Register</button>

</form>

</div>

</section>

<footer>

&copy; 2026 My Website. All Rights Reserved.

</footer>

</body>
</html>