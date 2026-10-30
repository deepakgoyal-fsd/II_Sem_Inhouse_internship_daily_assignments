<?php

$name = trim($_POST["name"]);
$email = trim($_POST["email"]);
$branch = trim($_POST["branch"]);
$phone = trim($_POST["phone"]);
$gender = $_POST["gender"] ?? "";
$course = $_POST["course"];
$address = trim($_POST["address"]);

$errors = [];

if(empty($name)){
    $errors[] = "Name is required.";
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors[] = "Please enter a valid email.";
}

if(strlen($phone) != 10 || !is_numeric($phone)){
    $errors[] = "Phone number must be exactly 10 digits.";
}

if(empty($gender)){
    $errors[] = "Please select a gender.";
}

if(strlen($address) < 10){
    $errors[] = "Address must be at least 10 characters.";
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

<body class="bg-light">

<div class="container py-5">

<?php

if(count($errors) > 0){

echo "<div class='alert alert-danger'>";
echo "<h4>Registration Failed</h4>";
echo "<ul>";

foreach($errors as $error){
    echo "<li>$error</li>";
}

echo "</ul>";
echo "<a href='register.php' class='btn btn-danger'>Go Back</a>";
echo "</div>";

}else{

?>

<div class="card shadow">

<div class="card-header bg-success text-white">

<h2>Registration Successful</h2>

</div>

<div class="card-body">

<h4>Welcome, <?php echo $name; ?> 🎉</h4>

<table class="table table-bordered mt-4">

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

<a href="register.php" class="btn btn-primary">

Register Another Student

</a>

</div>

</div>

<?php } ?>

</div>

</body>

</html>