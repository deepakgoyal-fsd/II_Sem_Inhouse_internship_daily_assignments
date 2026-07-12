<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="text-center text-primary">
Forgot Password
</h2>

<form action="" method="POST">

<div class="mb-3">

<label>Email Address</label>

<input
type="email"
name="email"
class="form-control"
placeholder="Enter your email"
required>

</div>

<button class="btn btn-primary w-100">

Send Reset Link

</button>

</form>

<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{

echo "

<div class='alert alert-success mt-3'>

Reset link sent successfully.
(UI Only)

</div>

";

}

?>

<br>

<a href="login.php" class="btn btn-secondary w-100">

Back to Login

</a>

</div>

</div>

</body>
</html>