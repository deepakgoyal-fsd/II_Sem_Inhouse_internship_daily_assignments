<?php

include("includes/auth.php");
include("includes/db.php");

$id = $_SESSION['user_id'];

$message = "";

if(isset($_POST['change_password']))
{

$current_password = $_POST['current_password'];

$new_password = $_POST['new_password'];

$confirm_password = $_POST['confirm_password'];

$stmt = mysqli_prepare($conn,
"SELECT password FROM users WHERE id=?");

mysqli_stmt_bind_param($stmt,"i",$id);

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$user = mysqli_fetch_assoc($result);

if(password_verify($current_password,$user['password']))
{

if($new_password==$confirm_password)
{

$hashed_password=password_hash($new_password,PASSWORD_DEFAULT);

$stmt=mysqli_prepare($conn,
"UPDATE users SET password=? WHERE id=?");

mysqli_stmt_bind_param(
$stmt,
"si",
$hashed_password,
$id
);

if(mysqli_stmt_execute($stmt))
{

$message="<div class='alert alert-success'>
Password Changed Successfully
</div>";

}
else{

$message="<div class='alert alert-danger'>
Unable to Update Password
</div>";

}

}
else{

$message="<div class='alert alert-warning'>
New Password and Confirm Password do not match.
</div>";

}

}
else{

$message="<div class='alert alert-danger'>
Current Password is Incorrect.
</div>";

}

}

include("includes/header.php");

?>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-info text-white">

<h3>Change Password</h3>

</div>

<div class="card-body">

<?= $message ?>

<form method="POST">

<div class="mb-3">

<label>Current Password</label>

<input
type="password"
name="current_password"
class="form-control"
required>

</div>

<div class="mb-3">

<label>New Password</label>

<input
type="password"
name="new_password"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Confirm Password</label>

<input
type="password"
name="confirm_password"
class="form-control"
required>

</div>

<div class="d-grid">

<button
class="btn btn-info text-white"
name="change_password">

Update Password

</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

<?php
include("includes/footer.php");
?>