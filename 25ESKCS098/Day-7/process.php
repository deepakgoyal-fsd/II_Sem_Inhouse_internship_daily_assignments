<?php

$errors=array();

/* Get Data */

$name=trim($_POST['name']);
$email=trim($_POST['email']);
$branch=trim($_POST['branch']);
$phone=trim($_POST['phone']);
$gender=isset($_POST['gender']) ? $_POST['gender'] : "";
$course=trim($_POST['course']);
$address=trim($_POST['address']);

/* Validation */

if(empty($name)){

$errors[]="Name is required.";

}

if(!preg_match("/^[a-zA-Z ]+$/",$name)){

$errors[]="Name should contain only letters.";

}

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

$errors[]="Please enter a valid email address.";

}

if(empty($branch)){

$errors[]="Please select a branch.";

}

if(!is_numeric($phone) || strlen($phone)!=10){

$errors[]="Phone number must be exactly 10 digits.";

}

if(empty($gender)){

$errors[]="Please select your gender.";

}

if(strlen($address)<10){

$errors[]="Address must contain at least 10 characters.";

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Registration Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<?php

if(count($errors)>0){

?>

<div class="alert alert-danger">

<h4>Validation Errors</h4>

<ul>

<?php

foreach($errors as $error){

echo "<li>$error</li>";

}

?>

</ul>

</div>

<a href="register.php" class="btn btn-primary">

Go Back

</a>

<?php

}

else{

?>

<div class="card">

<div class="card-header bg-success text-white">

Registration Received

</div>

<div class="card-body">

<h3>

Welcome,

<?php echo $name; ?>!

</h3>

<table class="table table-bordered">

<tr>

<th>Name</th>

<td><?php echo $name; ?></td>

</tr>

<tr>

<th>Email</th>

<td><?php echo $email; ?></td>

</tr>

<tr>

<th>Branch</th>

<td><?php echo $branch; ?></td>

</tr>

<tr>

<th>Phone</th>

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

<td><?php echo $address; ?></td>

</tr>

</table>

<div class="text-center">

<a href="register.php" class="btn btn-success">

Register Another Student

</a>

</div>

</div>

</div>

<?php

}

?>

</div>

<footer>

Student Registration System - Day 7

</footer>

</body>

</html>