<?php

include("includes/db.php");

session_start();

$message="";

if(isset($_POST['login']))
{

$email=$_POST['email'];

$password=$_POST['password'];

$query=mysqli_query($conn,

"SELECT * FROM users WHERE email='$email'");

if(mysqli_num_rows($query)>0)
{

$user=mysqli_fetch_assoc($query);

if(password_verify($password,$user['password']))
{

$_SESSION['user_id']=$user['id'];

$_SESSION['name']=$user['name'];

$_SESSION['email']=$user['email'];

$_SESSION['role']=$user['role'];

if($user['role']=="admin")
{

header("Location:admin/dashboard.php");

}
else{

header("Location:dashboard.php");

}

exit();

}

else{

$message="<div class='alert alert-danger'>
Incorrect Password
</div>";

}

}

else{

$message="<div class='alert alert-danger'>
Email Not Registered
</div>";

}

}

include("includes/header.php");

?>

<div class="container my-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-success text-white text-center">

<h3>Login</h3>

</div>

<div class="card-body">

<?= $message ?>

<form method="POST">

<div class="mb-3">

<label>Email</label>

<input
type="email"
class="form-control"
name="email"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
class="form-control"
name="password"
required>

</div>

<div class="d-grid">

<button
class="btn btn-success"
name="login">

Login

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