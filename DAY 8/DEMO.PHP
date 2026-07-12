<?php

$errors = [];

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$gender = $_POST['gender'] ?? "";
$course = $_POST['course'] ?? "";
$address = trim($_POST['address']);

// Name Validation
if (empty($name)) {
    $errors[] = "Name is required.";
} elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
    $errors[] = "Name should contain only letters.";
}

// Email Validation
if (empty($email)) {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid Email.";
}

// Phone Validation
if (!preg_match("/^[0-9]{10}$/", $phone)) {
    $errors[] = "Phone number must be 10 digits.";
}

// Password Validation
if (strlen($password) < 6) {
    $errors[] = "Password must be at least 6 characters.";
}

if ($password != $confirm_password) {
    $errors[] = "Passwords do not match.";
}

// Gender Validation
if (empty($gender)) {
    $errors[] = "Please select Gender.";
}

// Course Validation
if (empty($course)) {
    $errors[] = "Please select Course.";
}

// Address Validation
if (strlen($address) < 10) {
    $errors[] = "Address must be at least 10 characters.";
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Confirmation Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<?php

if(count($errors)>0){

echo "<div class='alert alert-danger'>";
echo "<h3>Validation Errors</h3>";
echo "<ul>";

foreach($errors as $error){
echo "<li>$error</li>";
}

echo "</ul>";
echo "<a href='register.php' class='btn btn-primary'>Go Back</a>";
echo "</div>";

}else{

?>

<div class="card shadow">

<div class="card-header bg-success text-white">
<h2>Registration Successful</h2>
</div>

<div class="card-body">

<p><strong>Name:</strong> <?php echo $name; ?></p>

<p><strong>Email:</strong> <?php echo $email; ?></p>

<p><strong>Phone:</strong> <?php echo $phone; ?></p>

<p><strong>Gender:</strong> <?php echo $gender; ?></p>

<p><strong>Course:</strong> <?php echo $course; ?></p>

<p><strong>Address:</strong> <?php echo $address; ?></p>

<p><strong>Photo:</strong>
<?php
if(isset($_FILES['photo']) && $_FILES['photo']['name']!=""){
echo $_FILES['photo']['name'];
}else{
echo "No Photo Uploaded";
}
?>
</p>

<a href="register.php" class="btn btn-success">
Register Another Student
</a>

</div>

</div>

<?php } ?>

</div>

</body>
</html>