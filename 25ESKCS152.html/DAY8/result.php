<!DOCTYPE html>
<html>

<head>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow-lg">

<div class="card-header text-center bg-primary text-white">

<h2>
<i class="fa-solid fa-circle-check"></i>
Registration Successful
</h2>

</div>

<div class="card-body">

<?php

$name=$_POST['name'];
$email=$_POST['email'];
$course=$_POST['course'];
$gender=$_POST['gender'];
$address=$_POST['address'];

echo "<h3 class='text-success'>Welcome, $name 🎉</h3>";

echo "<span class='badge bg-primary'>Student</span>
<span class='badge bg-success'>Verified</span>
<hr>";

echo "<p><b>Name :</b> $name</p>";
echo "<p><b>Email :</b> $email</p>";
echo "<p><b>Course :</b> $course</p>";
echo "<p><b>Gender :</b> $gender</p>";
echo "<p><b>Address :</b> $address</p>";

echo "<div class='alert alert-success mt-4'>
<i class='fa-solid fa-check'></i>
Registration Completed Successfully!
</div>";

?>

</div>

</div>

</div>

</body>

</html>