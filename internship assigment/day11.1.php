<?php
include("db_connect.php");
session_start();

$error = "";

if(isset($_POST['login']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if($email=="" || $password=="")
    {
        $error = "<div class='alert alert-danger'>All fields are required.</div>";
    }
    else
    {
        $select = mysqli_query($conn,"SELECT * FROM user WHERE email='$email' AND password='$password'");

        if(mysqli_num_rows($select)>0)
        {
            $row = mysqli_fetch_assoc($select);

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['profile_image'] = $row['profile_image'];

            header("Location: dashboard.php");
            exit();
        }
        else
        {
            $error = "<div class='alert alert-danger'>Invalid Email or Password!</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>

<title>Student Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5" style="max-width:450px;">

<div class="card shadow p-4">

<h2 class="text-center mb-4">Student Login</h2>

<?php echo $error; ?>

<form method="POST">

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
name="login"
class="btn btn-primary w-100">
Login
</button>

<div class="text-center mt-3">
<a href="forgot_password.php">Forgot Password?</a>
</div>

<div class="text-center mt-2">
Don't have an account?
<a href="register.php">Register</a>
</div>

</form>

</div>

</div>

</body>

</html>
