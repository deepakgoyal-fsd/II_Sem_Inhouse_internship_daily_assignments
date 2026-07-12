<?php
include("db_connect.php");
if(isset($_POST['register']))
{
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    if(empty($full_name) || empty($username) || empty($email) || empty($phone) || empty($password))
    {
        echo "<div class='alert alert-danger'>All fields are required.</div>";
    }
    else
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, full_name, email, phone, password)
                VALUES ('$username', '$full_name', '$email', '$phone', '$password')";
        $result = mysqli_query($conn, $sql);
       if($result)
        {
            echo "<div class='alert alert-success'>Registration Successful.</div>";
        }
        else
        {
            echo "<div class='alert alert-danger'>Registration Failed: " . mysqli_error($conn) . "</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Student Portfolio Builder</title>
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
                        Create Your Account
                    </h4>
                    <p class="text-muted">
                        Fill in your details to get started.
                    </p>
                </div>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label class="form-label">
                            Full Name
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            name="full_name"
                            placeholder="Enter your full name">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Username
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            name="username"
                            placeholder="Choose a username">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Email
                        </label>
                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">
                            Phone Number
                        </label>
                        <input
                            type="text"
                            class="form-control"
                            name="phone"
                            placeholder="Enter your phone number">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">
                            Password
                        </label>
                        <input
                            type="password"
                            class="form-control"
                            name="password"
                            placeholder="Create a password">
                    </div>
                    <button
                          type="submit" name="register"
                               class="btn btn-success w-100">
                                   Register
                    </button>
                </form>
                <p class="text-center mt-4 mb-0">
                    Already have an account?
                    <a href="login.php" class="text-success text-decoration-none fw-semibold">
                        Login
                    </a>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>