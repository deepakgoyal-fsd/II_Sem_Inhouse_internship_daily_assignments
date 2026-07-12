<?php
include("db_connect.php");

$message = "";

if(isset($_POST['register']))
{
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $password = mysqli_real_escape_string($conn,$_POST['password']);

    // Check if email already exists
    $check = mysqli_query($conn,"SELECT * FROM user WHERE email='$email'");

    if(mysqli_num_rows($check) > 0)
    {
        $message = "<div class='alert alert-danger'>Email already exists!</div>";
    }
    else
    {
        $insert = mysqli_query($conn,"INSERT INTO user(name,email,password)
        VALUES('$name','$email','$password')");

        if($insert)
        {
            $message = "<div class='alert alert-success'>Registration Successful!</div>";
        }
        else
        {
            $message = "<div class='alert alert-danger'>Registration Failed!</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5" style="max-width:450px;">

<div class="card shadow p-4">

<h2 class="text-center mb-4">Student Registration</h2>

<?php echo $message; ?>

<form method="POST">

<label>Name</label>

<input
type="text"
name="name"
class="form-control mb-3"
placeholder="Enter Name"
required>

<label>Email</label>

<input
type="email"
name="email"
class="form-control mb-3"
placeholder="Enter Email"
required>

<label>Password</label>

<input
type="password"
name="password"
class="form-control mb-3"
placeholder="Enter Password"
required>

<button
type="submit"
name="register"
class="btn btn-success w-100">
Register
</button>

<div class="text-center mt-3">
Already have an account?
<a href="index.php">Login</a>
</div>

</form>

</div>

</div>

</body>
</html>
