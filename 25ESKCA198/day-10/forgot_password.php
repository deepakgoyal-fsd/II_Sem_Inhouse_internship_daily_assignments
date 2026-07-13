```php id="s4g6tr"
<?php
include("db.php");

if(isset($_POST['reset'])){

    $email = mysqli_real_escape_string($conn,$_POST['email']);

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $update = mysqli_query($conn,"UPDATE users SET password='$password' WHERE email='$email'");

    if(mysqli_affected_rows($conn) > 0){

        echo "<script>
        alert('Password Updated Successfully');
        window.location='login.php';
        </script>";

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

<title>Forgot Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card mt-5 shadow">

<div class="card-header bg-warning text-center">

<h3>Reset Password</h3>

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

<label>New Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button
class="btn btn-warning w-100"
name="reset">

Update Password

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>
```
