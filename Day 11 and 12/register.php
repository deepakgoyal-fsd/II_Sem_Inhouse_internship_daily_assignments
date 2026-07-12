<?php
include("db.php");

$message = "";

if(isset($_POST['register']))
{
    $name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm_password']);
    if($name=="" || $email=="" || $password=="")
    {
        $message = "<div class='alert alert-danger'>Please fill all fields.</div>";
    }
    elseif($password != $confirm)
    {
        $message = "<div class='alert alert-warning'>Passwords do not match.</div>";
    }
    else
    {
        $check = mysqli_query($conn,"SELECT * FROM users WHERE email='$email'");

        if(mysqli_num_rows($check)>0)
        {
            $message = "<div class='alert alert-danger'>Email already registered.</div>";
        }
        else
        {
            $sql="INSERT INTO users(full_name,email,password)
                  VALUES('$name','$email','$password')";

            if(mysqli_query($conn,$sql))
            {
                $message="<div class='alert alert-success'>
                Registration Successful.
                <br>
                <a href='login.php'>Click here to Login</a>
                </div>";
            }
            else
            {
                $message="<div class='alert alert-danger'>
                Registration Failed.
                </div>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
<title>Register</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-5">
<div class="card mt-5">
<div class="card-header bg-success text-white">
<h3 class="text-center">Student Registration</h3>
</div>

<div class="card-body">
<?php echo $message; ?>
<form method="POST">
<div class="mb-3">
<label>Full Name</label>
<input
type="text"
name="full_name"
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
type="submit"
name="register"
class="btn btn-success">
Register
</button>
</div>
</form>
<hr>
<div class="text-center">
Already have an account?
<a href="login.php">
Login Here
</a>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
