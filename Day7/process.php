<!DOCTYPE html>
<html>

<head>

<title>Registration Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<?php

$name=$_POST['name'];
$email=$_POST['email'];
$branch=$_POST['branch'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$course=$_POST['course'];
$address=$_POST['address'];

$errors=array();

/* Name */

if(empty($name))
{
    $errors[]="Name is required";
}

if(preg_match('/[0-9]/',$name))
{
    $errors[]="Name should not contain numbers";
}

/* Email */

if(!filter_var($email,FILTER_VALIDATE_EMAIL))
{
    $errors[]="Enter a valid Email";
}

/* Phone */

if(strlen($phone)!=10)
{
    $errors[]="Phone Number must be 10 digits";
}

if(!is_numeric($phone))
{
    $errors[]="Phone Number should contain only numbers";
}

/* Gender */

if(empty($gender))
{
    $errors[]="Please Select Gender";
}

/* Course */

if(empty($course))
{
    $errors[]="Please Select Course";
}

/* Address */

if(strlen($address)<10)
{
    $errors[]="Address should be at least 10 characters";
}

if(count($errors)>0)
{

echo "<div class='alert alert-danger'>";

echo "<h4>Validation Errors</h4>";

echo "<ul>";

foreach($errors as $error)
{
    echo "<li>$error</li>";
}

echo "</ul>";

echo "<a href='register.php' class='btn btn-danger'>Go Back</a>";

echo "</div>";

}

else
{

?>

<div class="card shadow p-4">

<h2 class="text-success">

Registration Successful

</h2>

<p><b>Name :</b> <?php echo $name; ?></p>

<p><b>Email :</b> <?php echo $email; ?></p>

<p><b>Branch :</b> <?php echo $branch; ?></p>

<p><b>Phone :</b> <?php echo $phone; ?></p>

<p><b>Gender :</b> <?php echo $gender; ?></p>

<p><b>Course :</b> <?php echo $course; ?></p>

<p><b>Address :</b> <?php echo $address; ?></p>

<a href="register.php" class="btn btn-primary">

Register Again

</a>

</div>

<?php

}

?>

</div>

</body>

</html>