<?php
session_start();
include("db.php");

// If user is already logged in
if(isset($_SESSION['user_id']))
{
    header("Location: dashboard.php");
    exit();
}

$message = "";

if(isset($_POST['login']))
{
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if(empty($email) || empty($password))
    {
        $message = "Please fill all fields.";
    }
    else
    {
        $sql = "SELECT * FROM users WHERE email = ? AND status='Active'";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1)
        {
            $user = mysqli_fetch_assoc($result);
            if($password == $user['password'])
            {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['full_name'] = $user['full_name'];
                $_SESSION['email'] = $user['email'];
                // Update Last Login
                $update = "UPDATE users SET last_login = NOW() WHERE user_id = ?";
                $stmt2 = mysqli_prepare($conn, $update);
                mysqli_stmt_bind_param($stmt2, "i", $user['user_id']);
                mysqli_stmt_execute($stmt2);

                header("Location: dashboard.php");
                exit();
            }
            else
            {
                $message = "Invalid Email or Password.";
            }
        }
        else
        {
            $message = "Invalid Email or Password.";
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>

    <title>Login</title>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-5">
<div class="card mt-5 shadow">
<div class="card-header bg-primary text-white text-center">
<h3>Student Login</h3>

</div>

<div class="card-body">

<?php

if($message != "")
{
    echo "<div class='alert alert-danger'>$message</div>";
}

?>

<form method="POST">

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
placeholder="Enter Email">

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
placeholder="Enter Password">

</div>

<div class="d-grid">

<button
type="submit"
name="login"
class="btn btn-primary">

Login

</button>
</div>
</form>
<hr>
<div class="text-center">
<a href="forgot_password.php">

Forgot Password?
<hr>

<div class="text-center">

Don't have an account?

<a href="register.php">

Register Here

</a>

</div>

</a>
</div>
</div>
</div>
</div>
</div>
</div>
</body>

</html>