<!DOCTYPE html>

<html>

<head>

<title>Welcome</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<?php

$name="Dhruv Singh Rajpurohit";

$favLanguage="PHP";

$date=date("d-m-Y");

$time=date("h:i:s A");

$ip=$_SERVER['REMOTE_ADDR'];

?>

<div class="container">

<div class="card">

<div class="card-header">

Welcome to PHP

</div>

<div class="card-body">

<h3>

Hello,

<?php echo $name; ?>

</h3>

<table class="table table-bordered">

<tr>

<th>Current Date</th>

<td><?php echo $date; ?></td>

</tr>

<tr>

<th>Current Time</th>

<td><?php echo $time; ?></td>

</tr>

<tr>

<th>Favourite Language</th>

<td><?php echo $favLanguage; ?></td>

</tr>

<tr>

<th>Visitor IP</th>

<td><?php echo $ip; ?></td>

</tr>

</table>

<div class="text-center">

<a href="student_profile.php" class="btn btn-primary">

Student Profile

</a>

</div>

</div>

</div>

</div>

<footer>

Student Registration System - Day 7

</footer>

</body>

</html>