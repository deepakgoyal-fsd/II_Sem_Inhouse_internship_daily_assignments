<?php

session_start();

if(isset($_SESSION['user_id'])){

header("Location: dashboard.php");

exit();

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center mt-5">

<div class="col-md-5">

<div class="card">

<div class="card-header text-center">

<h3>Student Login</h3>

</div>

<div class="card-body">

<?php

if(isset($_GET['error'])){

?>

<div class="alert alert-danger">

Invalid Credentials

</div>

<?php

}

?>

<form action="authenticate.php" method="POST">

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
id="password"
class="form-control"
required>

</div>

<div class="form-check mb-3">

<input
type="checkbox"
class="form-check-input"
onclick="showPassword()">

<label class="form-check-label">

Show Password

</label>

</div>

<button
class="btn btn-primary w-100">

Login

</button>
<a href="forgot_password.php">

Forgot Password?

</a>

</form>

</div>

</div>

</div>

</div>

</div>

<script>

function showPassword(){

var x=document.getElementById("password");

if(x.type=="password"){

x.type="text";

}

else{

x.type="password";

}

}

</script>

</body>

</html>