<?php

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: index.php");
    exit();
}

$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$gender = htmlspecialchars($_POST['gender']);
$course = htmlspecialchars($_POST['course']);
$address = htmlspecialchars($_POST['address']);

$photoName = "No Photo Selected";

if(isset($_FILES['photo']) && $_FILES['photo']['name']!=""){
    $photoName = $_FILES['photo']['name'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registration Successful</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

body{
background:linear-gradient(135deg,#0f172a,#1e3a8a,#0f766e);
min-height:100vh;
}

.card{
border:none;
border-radius:20px;
overflow:hidden;
}

.header{
background:linear-gradient(90deg,#2563eb,#7c3aed,#06b6d4);
color:white;
padding:25px;
text-align:center;
}

.table td,
.table th{
vertical-align:middle;
}

.badge{
font-size:14px;
padding:8px 15px;
}

</style>

</head>

<body>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<div class="card shadow-lg">

<div class="header">

<h2>
<i class="bi bi-check-circle-fill"></i>
Registration Successful
</h2>

<span class="badge bg-warning text-dark">
Student Details
</span>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<tr>
<th>Student Name</th>
<td><?php echo $name; ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo $email; ?></td>
</tr>

<tr>
<th>Phone Number</th>
<td><?php echo $phone; ?></td>
</tr>

<tr>
<th>Gender</th>
<td><?php echo $gender; ?></td>
</tr>

<tr>
<th>Course</th>
<td><?php echo $course; ?></td>
</tr>

<tr>
<th>Address</th>
<td><?php echo nl2br($address); ?></td>
</tr>

<tr>
<th>Uploaded Photo</th>
<td><?php echo $photoName; ?></td>
</tr>

</table>

<div class="alert alert-success">

<i class="bi bi-person-check-fill"></i>

<b>Congratulations!</b>

Student registration has been completed successfully.

</div>

<div class="text-center">

<a href="index.php" class="btn btn-primary">

<i class="bi bi-arrow-left-circle"></i>

Register Another Student

</a>

</div>

</div>

</div>

</div>

</div>

</div>

</body>

</html>