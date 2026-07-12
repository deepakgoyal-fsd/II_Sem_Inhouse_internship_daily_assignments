<?php
include("db_connect.php");
session_start();

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {
        $row = mysqli_fetch_assoc($result);

        $_SESSION['name'] = $row['name'];
        $_SESSION['photo'] = $row['photo'];

        header("Location: dashboard.php");
        exit();
    }
    else
    {
        echo "<script>alert('Invalid Email or Password');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-5">

<div class="card shadow">

<div class="card-header text-center">
<h3>Login</h3>
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button class="btn btn-success w-100" name="login">
Login
</button>

</form>

<br>

<a href="registration.php" class="btn btn-primary w-100">
Create Account
</a>

</div>

</div>

</div>
</div>
</div>

</body>
</html>