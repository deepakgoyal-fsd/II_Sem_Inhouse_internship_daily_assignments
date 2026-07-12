<?php

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$branch = trim($_POST['branch']);
$gender = $_POST['gender'] ?? "";
$course = trim($_POST['course']);
$address = trim($_POST['address']);

$errors = [];

/* Name Validation */

if(empty($name)){
    $errors[] = "Name is required.";
}
elseif(!preg_match("/^[a-zA-Z ]+$/",$name)){
    $errors[] = "Name should contain only letters.";
}

/* Email Validation */

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors[]="Please enter a valid Email.";
}

/* Phone Validation */

if(!is_numeric($phone) || strlen($phone)!=10){
    $errors[]="Phone number must be exactly 10 digits.";
}

/* Branch */

if(empty($branch)){
    $errors[]="Please select your Branch.";
}

/* Gender */

if(empty($gender)){
    $errors[]="Please select Gender.";
}

/* Course */

if(empty($course)){
    $errors[]="Please select Course.";
}

/* Address */

if(strlen($address)<10){
    $errors[]="Address should contain at least 10 characters.";
}

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<title>Registration Status</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<?php

if(count($errors)>0){

?>

<div class="alert alert-danger">

<h4>Registration Failed</h4>

<ul>

<?php

foreach($errors as $error){

echo "<li>$error</li>";

}

?>

</ul>

<a href="index.php" class="btn btn-danger">
Go Back
</a>

</div>

<?php

}else{

?>

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Registration Successful</h3>

</div>

<div class="card-body">

<div class="alert alert-success">

<h4>Welcome, <?php echo $name; ?> 🎉</h4>

<p>Your registration has been received successfully.</p>

</div>

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
<th>Phone</th>
<td><?php echo $phone; ?></td>
</tr>

<tr>
<th>Branch</th>
<td><?php echo $branch; ?></td>
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

<tr>
<th>Photo</th>
<td>Photo Uploaded (UI Only)</td>
</tr>

</table>

<a href="index.php" class="btn btn-primary">

Register Another Student

</a>

</div>

</div>

<?php

}

?>

</div>

</body>

</html>