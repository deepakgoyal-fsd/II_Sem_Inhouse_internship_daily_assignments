<!DOCTYPE html>

<html>

<head>

<title>Student Profile</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<?php

$name="Dhruv Singh Rajpurohit";

$college="Your College Name";

$branch="Computer Science and Engineering";

$year="2nd Year";

$bio="I am a Computer Science student passionate about Web Development and Programming.";

/* Challenge */

$currentYear=date("Y");

$currentMonth=date("n");

if($currentMonth<6){

$academicYear=($currentYear-1)." - ".$currentYear;

}

else{

$academicYear=$currentYear." - ".($currentYear+1);

}

?>

<div class="container">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card">

<div class="card-header">

Student Profile

</div>

<div class="card-body text-center">

<img
src="images/profile.png"
class="profile-img"
alt="Profile">

<h3><?php echo $name; ?></h3>

<table class="table table-bordered mt-3">

<tr>

<th>College</th>

<td><?php echo $college; ?></td>

</tr>

<tr>

<th>Branch</th>

<td><?php echo $branch; ?></td>

</tr>

<tr>

<th>Year of Study</th>

<td><?php echo $year; ?></td>

</tr>

<tr>

<th>Academic Year</th>

<td><?php echo $academicYear; ?></td>

</tr>

<tr>

<th>Bio</th>

<td><?php echo $bio; ?></td>

</tr>

</table>

<a href="register.php" class="btn btn-primary">

Go to Registration Form

</a>

</div>

</div>

</div>

</div>

</div>

<footer>

Student Registration System - Day 7

</footer>

</body>

</html>