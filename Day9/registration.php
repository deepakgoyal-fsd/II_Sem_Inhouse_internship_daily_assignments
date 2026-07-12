<?php
include('db_connect.php');

$name = $_POST["name"] ?? "";
$email = $_POST["email"] ?? "";
$phonenumber = $_POST["phonenumber"] ?? "";

$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($name)) {
        $error[] = "Name is required";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Invalid email format";
    }

    if (!is_numeric($phonenumber)) {
        $error[] = "Phone number must be numeric";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Registration Form</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#dbeafe;
}

.Form-Container{
    width:700px;
}
</style>

</head>

<body class="d-flex justify-content-center align-items-center vh-100">

<div class="Form-Container bg-white p-4 rounded shadow">

<h1 class="text-center mb-4">Registration Form</h1>

<?php
if(!empty($error)){
    echo '<div class="alert alert-danger">';
    foreach($error as $err){
        echo $err."<br>";
    }
    echo '</div>';
}
?>

<form action="welcome.php" method="POST">

<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" class="form-control" name="name" placeholder="Enter full name">
</div>

<div class="mb-3">
<label class="form-label">Email Address</label>
<input type="email" class="form-control" name="email" placeholder="Enter email address">
</div>

<div class="row">

<div class="col-md-6 mb-3">
<label class="form-label">Phone Number</label>
<input type="text" class="form-control" name="phonenumber" placeholder="Enter phone number">
</div>

<div class="col-md-6 mb-3">
<label class="form-label">Birth Date</label>
<input type="date" class="form-control" name="birthdate">
</div>

</div>

<div class="mb-3">
<label class="form-label">Gender</label><br>

<input type="radio" name="gender" value="Male"> Male

<input type="radio" name="gender" value="Female" class="ms-3"> Female

<input type="radio" name="gender" value="Prefer not to say" class="ms-3"> Prefer not to say

</div>

<div class="mb-3">
<label class="form-label">Address</label>

<input type="text" class="form-control mb-2" name="address" placeholder="Enter street address">

<input type="text" class="form-control" name="address2" placeholder="Enter street address line 2">
</div>

<div class="row">

<div class="col-md-6 mb-3">
<select class="form-select" name="country">
<option>Select Country</option>
<option>India</option>
<option>USA</option>
<option>Canada</option>
<option>Australia</option>
</select>
</div>

<div class="col-md-6 mb-3">
<input type="text" class="form-control" placeholder="Enter your City">
</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">
<input type="text" class="form-control" placeholder="Enter your Region">
</div>

<div class="col-md-6 mb-3">
<input type="text" class="form-control" placeholder="Enter Postal Code">
</div>

</div>

<button type="submit" class="btn btn-primary w-100">Submit</button>

</form>

</div>

</body>
</html>
