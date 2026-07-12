<?php

session_start();

$errors = [];

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$college = trim($_POST['college']);
$branch = trim($_POST['branch']);
$gender = $_POST['gender'] ?? "";
$course = trim($_POST['course']);
$address = trim($_POST['address']);

if(empty($name)){
    $errors[] = "Name is required.";
}
elseif(!preg_match("/^[A-Za-z ]+$/",$name)){
    $errors[] = "Name should contain only letters.";
}

if(empty($email)){
    $errors[] = "Email is required.";
}
elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors[] = "Invalid Email.";
}

if(empty($college)){
    $errors[] = "College is required.";
}

if(empty($branch)){
    $errors[] = "Branch is required.";
}

if(empty($gender)){
    $errors[] = "Please select Gender.";
}

if(empty($course)){
    $errors[] = "Please select Course.";
}

if(empty($address)){
    $errors[] = "Address is required.";
}
elseif(strlen($address)<10){
    $errors[] = "Address must be at least 10 characters.";
}

if(!empty($errors)){

$_SESSION['errors']=$errors;
$_SESSION['old']=$_POST;

header("Location: register.php");
exit;

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Registration Success</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h2>Student Registered Successfully!</h2>

</div>

<div class="card-body">

<div class="text-center mb-4">

<img src="https://placehold.co/150x150?text=Photo"
class="img-thumbnail">

</div>

<table class="table table-bordered">

<tr>
<th>Name</th>
<td><?php echo htmlspecialchars($name); ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo htmlspecialchars($email); ?></td>
</tr>

<tr>
<th>College</th>
<td><?php echo htmlspecialchars($college); ?></td>
</tr>

<tr>
<th>Branch</th>
<td><?php echo htmlspecialchars($branch); ?></td>
</tr>

<tr>
<th>Gender</th>
<td><?php echo htmlspecialchars($gender); ?></td>
</tr>

<tr>
<th>Course</th>
<td><?php echo htmlspecialchars($course); ?></td>
</tr>

<tr>
<th>Address</th>
<td><?php echo nl2br(htmlspecialchars($address)); ?></td>
</tr>

</table>

<a href="register.php" class="btn btn-primary">
Register Another Student
</a>

</div>

</div>

</div>

</body>

</html>