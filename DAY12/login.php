<?php
session_start();
include("db_connect.php");

$message = "";

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $_SESSION['email'] = $email;
        header("Location: dashboard.php");
        exit();
    }
    else
    {
        $message = "<div class='alert alert-danger'>Invalid Email or Password</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="text-center text-primary">
Student Login
</h2>

<?php echo $message; ?>

<form method="POST">

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<button type="submit" name="login" class="btn btn-primary w-100">
Login
</button>

</form>

<br>

<a href="forgot_password.php">Forgot Password?</a>

</div>

</div>

</body>
</html>