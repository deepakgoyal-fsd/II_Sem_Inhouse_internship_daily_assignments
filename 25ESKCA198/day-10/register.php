```php
<?php
session_start();
include("db.php");

if(isset($_POST['register'])){

    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

    if(mysqli_num_rows($check) > 0){
        echo "<script>alert('Email already exists');</script>";
    }else{

        $insert = mysqli_query($conn,"INSERT INTO users(name,email,password)
        VALUES('$name','$email','$password')");

        if($insert){
            echo "<script>
            alert('Registration Successful');
            window.location='login.php';
            </script>";
        }else{
            echo "<script>alert('Registration Failed');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card mt-5 shadow">

<div class="card-header bg-primary text-white text-center">

<h3>Create Account</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

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
class="btn btn-success w-100"
name="register">

Register

</button>

</form>

<hr>

<p class="text-center">

Already have an account?

<a href="login.php">Login</a>

</p>

</div>

</div>

</div>

</div>

</div>

</body>
</html>
```
