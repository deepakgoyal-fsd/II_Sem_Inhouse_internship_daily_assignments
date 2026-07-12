<?php
session_start();
include("db_connect.php");
if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    if(empty($email) || empty($password))
    {
        echo "<div class='alert alert-danger'>All fields are required.</div>";
    }
    else
    {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
       if(mysqli_num_rows($result) > 0)
{
    $row = mysqli_fetch_assoc($result);
    if(password_verify($password, $row['password']))
    {
        $_SESSION['user_id'] = $row['id'];
$_SESSION['username'] = $row['username'];
header("Location: dashboard.php");
exit();
    }
    else
    {
        echo "<div class='alert alert-danger'>Incorrect Password</div>";
    }
}
else
{
    echo "<div class='alert alert-danger'>Email not found.</div>";
}
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Student Portfolio Builder</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <div class="row justify-content-center align-items-center min-vh-100">
        <div class="col-lg-5 col-md-7">
            <div class="card shadow p-4 border-0 rounded-4">
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-success">
                        Student Portfolio Builder
                    </h2>
                    <h4 class="mt-3">
                        Welcome Back
                    </h4>
                    <p class="text-muted">
                        Login to access your portfolio.
                    </p>
                </div>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label">
                            Email
                        </label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            placeholder="Enter your email"
                            required>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">
                            Password
                        </label>
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            placeholder="Enter your password"
                            required>
                    </div>
                    <button
                        type="submit"
                        name="login"
                        class="btn btn-success w-100">
                        Login
                    </button>
                </form>
                <p class="text-center mt-4 mb-0">
                    Don't have an account?
                    <a href="register.php" class="text-success text-decoration-none fw-semibold">
                        Register
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>