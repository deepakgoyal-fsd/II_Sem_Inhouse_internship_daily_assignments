<?php

include "db_connect.php";

$fullname = trim($_POST['fullname']);
$email = trim($_POST['email']);
$branch = trim($_POST['branch']);
$phone = trim($_POST['phone']);
$gender = $_POST['gender'] ?? "";
$course = $_POST['course'] ?? "";
$address = trim($_POST['address']);

$errors = [];

if(empty($fullname)){
    $errors[] = "Full Name is required.";
}
elseif(!preg_match("/^[a-zA-Z ]+$/",$fullname)){
    $errors[] = "Name should contain only letters.";
}


if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errors[] = "Invalid Email.";
}


if(!preg_match("/^[0-9]{10}$/",$phone)){
    $errors[] = "Phone number must be 10 digits.";
}

if(empty($gender)){
    $errors[] = "Please select gender.";
}


if(empty($course)){
    $errors[] = "Please select course.";
}


if(strlen($address)<10){
    $errors[] = "Address should be minimum 10 characters.";
}

if(count($errors)>0)
{
?>

<!DOCTYPE html>
<html>
<head>
<title>Error</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="alert alert-danger">

<h4>Please Fix Following Errors</h4>

<ul>

<?php

foreach($errors as $error)
{
echo "<li>$error</li>";
}

?>

</ul>

<a href="register.php" class="btn btn-primary">Go Back</a>

</div>

</div>

</body>
</html>

<?php
exit();
}

$sql="INSERT INTO students(fullname,email,branch,phone,gender,course,address)
VALUES('$fullname','$email','$branch','$phone','$gender','$course','$address')";

if(mysqli_query($conn,$sql))
{
?>

<!DOCTYPE html>
<html>
<head>

<title>Success</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white text-center">

<h3>Registration Successful</h3>

</div>

<div class="card-body">

<p><b>Name :</b> <?php echo $fullname; ?></p>

<p><b>Email :</b> <?php echo $email; ?></p>

<p><b>Branch :</b> <?php echo $branch; ?></p>

<p><b>Phone :</b> <?php echo $phone; ?></p>

<p><b>Gender :</b> <?php echo $gender; ?></p>

<p><b>Course :</b> <?php echo $course; ?></p>

<p><b>Address :</b> <?php echo $address; ?></p>

<a href="index.php" class="btn btn-success">
View Students
</a>

<a href="register.php" class="btn btn-primary">
New Registration
</a>

</div>

</div>

</div>

</body>

</html>

<?php
}
else
{
echo "Error : ".mysqli_error($conn);
}

?>