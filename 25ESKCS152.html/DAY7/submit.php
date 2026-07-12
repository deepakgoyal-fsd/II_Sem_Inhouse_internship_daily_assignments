<?php

$errors = [];

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$phone = trim($_POST['phone']);
$dob = $_POST['dob'];
$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
$course = $_POST['course'];
$address = trim($_POST['address']);


// Name Validation
if (preg_match('/[0-9]/', $name)) {
    $errors[] = "Name should not contain numbers.";
}


// Email Validation
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email.";
}


// Password Validation
if (strlen($password) < 6) {
    $errors[] = "Password must be at least 6 characters.";
}


// Confirm Password
if ($password != $confirm_password) {
    $errors[] = "Passwords do not match.";
}


// Phone Validation
if (!preg_match('/^[0-9]{10}$/', $phone)) {
    $errors[] = "Phone number must contain exactly 10 digits.";
}


// Gender Validation
if (empty($gender)) {
    $errors[] = "Please select your gender.";
}


// Course Validation
if (empty($course)) {
    $errors[] = "Please select your course.";
}


// Address Validation
if (strlen($address) < 10) {
    $errors[] = "Address should be at least 10 characters.";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registration Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<?php

if (!empty($errors))
{

?>

<div class="error-box">

<h3>Registration Failed</h3>

<ul>

<?php

foreach($errors as $error)
{
    echo "<li>$error</li>";
}

?>

</ul>

<a href="index.html" class="btn btn-danger mt-3">

Go Back

</a>

</div>

<?php

}

else

{

?>

<div class="success-card">

<h2 class="text-center text-success mb-4">

🎉 Registration Successful

</h2>

<table class="table table-bordered">

<tr>
<th>Full Name</th>
<td><?php echo htmlspecialchars($name); ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo htmlspecialchars($email); ?></td>
</tr>

<tr>
<th>Phone</th>
<td><?php echo htmlspecialchars($phone); ?></td>
</tr>

<tr>
<th>Date of Birth</th>
<td><?php echo htmlspecialchars($dob); ?></td>
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

<tr>
<th>Profile Photo</th>
<td>
<?php
if(isset($_FILES['photo']) && $_FILES['photo']['name']!="")
{
    echo htmlspecialchars($_FILES['photo']['name']);
}
else
{
    echo "No Photo Uploaded";
}
?>
</td>
</tr>

</table>

<div class="text-center">

<a href="index.html" class="btn btn-primary">

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