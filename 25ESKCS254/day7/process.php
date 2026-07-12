<?php

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$branch = trim($_POST['branch'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$gender = $_POST['gender'] ?? '';
$course = trim($_POST['course'] ?? '');
$address = trim($_POST['address'] ?? '');

$errors = [];

// Name validation
if ($name == "") {
    $errors[] = "Full Name is required.";
} elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
    $errors[] = "Name should contain only alphabets and spaces.";
}

// Email validation
if ($email == "") {
    $errors[] = "Email Address is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid Email Address.";
}

// Branch validation
if ($branch == "") {
    $errors[] = "Branch is required.";
}

// Phone validation
if ($phone == "") {
    $errors[] = "Phone Number is required.";
} elseif (!is_numeric($phone) || strlen($phone) != 10) {
    $errors[] = "Phone Number must be exactly 10 digits.";
}

// Gender validation
if ($gender == "") {
    $errors[] = "Please select Gender.";
}

// Course validation
if ($course == "") {
    $errors[] = "Please select Course.";
}

// Address validation
if ($address == "") {
    $errors[] = "Address is required.";
} elseif (strlen($address) < 10) {
    $errors[] = "Address should contain at least 10 characters.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registration Result</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-8">

<?php

if (!empty($errors)) {

?>

<div class="alert alert-danger">

<h4 class="mb-3">
Please correct the following errors
</h4>

<ul class="mb-3">

<?php

foreach ($errors as $error) {

echo "<li>$error</li>";

}

?>

</ul>

<a href="index.php" class="btn btn-danger">
Go Back
</a>

</div>

<?php

} else {

?>

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3 class="mb-0">
Registration Received Successfully
</h3>

</div>

<div class="card-body">

<div class="alert alert-success">

<h4>
Welcome,
<?php echo htmlspecialchars($name); ?>!
</h4>

<p class="mb-0">
Your registration has been received successfully.
</p>

</div>

<table class="table table-bordered">

<tr>

<th width="30%">
Full Name
</th>

<td>
<?php echo htmlspecialchars($name); ?>
</td>

</tr>

<tr>

<th>
Email Address
</th>

<td>
<?php echo htmlspecialchars($email); ?>
</td>

</tr>

<tr>

<th>
Branch
</th>

<td>
<?php echo htmlspecialchars($branch); ?>
</td>

</tr>

<tr>

<th>
Phone Number
</th>

<td>
<?php echo htmlspecialchars($phone); ?>
</td>

</tr>

<tr>

<th>
Gender
</th>

<td>
<?php echo htmlspecialchars($gender); ?>
</td>

</tr>

<tr>

<th>
Course
</th>

<td>
<?php echo htmlspecialchars($course); ?>
</td>

</tr>

<tr>

<th>
Address
</th>

<td>
<?php echo nl2br(htmlspecialchars($address)); ?>
</td>

</tr>

<tr>

<th>
Profile Photo
</th>

<td>
Photo upload feature will be implemented in the next assignment.
</td>

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

</div>

</div>

</body>
</html>