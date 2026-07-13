```php
<?php
session_start();
include("db.php");

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($query)>0){

        $row = mysqli_fetch_assoc($query);

        if(password_verify($password,$row['password'])){

            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];

            header("Location: dashboard.php");
            exit();

        }else{

            echo "<script>alert('Incorrect Password');</script>";

        }

    }else{

        echo "<script>alert('Email Not Found');</script>";

    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card mt-5 shadow">

<div class="card-header bg-success text-white text-center">

<h3>Student Login</h3>

</div>

<div class="card-body">

<form method="POST">

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
class="form-control"
required>

</div>

<button
class="btn btn-primary w-100"
name="login">

Login

</button>

</form>

<hr>

<div class="d-flex justify-content-between">

<a href="register.php">
Create Account
</a>

<a href="forgot_password.php">
Forgot Password?
</a>

</div>

</div>

</div>

</div>

</div>

</div>

</body>
</html>
```
