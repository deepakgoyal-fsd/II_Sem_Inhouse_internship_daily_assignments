<?php

include("../includes/admin-auth.php");
include("../includes/db.php");

$message="";

if(isset($_POST['add']))
{

$name=trim($_POST['name']);
$email=trim($_POST['email']);
$phone=trim($_POST['phone']);
$gender=$_POST['gender'];
$dob=$_POST['dob'];
$address=trim($_POST['address']);
$role=$_POST['role'];
$password=password_hash($_POST['password'],PASSWORD_DEFAULT);

$stmt=mysqli_prepare($conn,"
INSERT INTO users
(name,email,phone,gender,dob,address,password,role)
VALUES
(?,?,?,?,?,?,?,?)");

mysqli_stmt_bind_param(
$stmt,
"ssssssss",
$name,
$email,
$phone,
$gender,
$dob,
$address,
$password,
$role
);

if(mysqli_stmt_execute($stmt))
{

$message="<div class='alert alert-success'>
User Added Successfully
</div>";

}
else{

$message="<div class='alert alert-danger'>
Email already exists.
</div>";

}

}

include("includes/header.php");

?>

<div class="container mt-4">

<h2>Add User</h2>

<?= $message ?>

<form method="POST">

<div class="row">

<div class="col-md-6 mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Gender</label>

<select
name="gender"
class="form-control">

<option>Male</option>

<option>Female</option>

</select>

</div>

<div class="col-md-6 mb-3">

<label>Date of Birth</label>

<input
type="date"
name="dob"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Role</label>

<select
name="role"
class="form-control">

<option value="user">User</option>

<option value="admin">Admin</option>

</select>

</div>

<div class="col-12 mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control"
rows="3"></textarea>

</div>

<div class="col-md-6 mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="col-12">

<button
class="btn btn-success"
name="add">

Add User

</button>

<a
href="users.php"
class="btn btn-secondary">

Back

</a>

</div>

</div>

</form>

</div>

<?php include("includes/footer.php"); ?>