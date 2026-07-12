<?php
session_start();
include 'db_connect.php';

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email == "" || $password == "") {

        $error = "Please enter Email and Password.";

    } else {

        $sql = "SELECT * FROM users
                WHERE email='$email'
                AND password='$password'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {

    $user = mysqli_fetch_assoc($result);

    $_SESSION['user_id'] = $user['id'];
$_SESSION['user_name'] = $user['name'];
$_SESSION['user_email'] = $user['email'];
$_SESSION['profile_picture'] = $user['profile_picture'];

    header("Location: dashboard.php");
    exit();

}

        else {

            $error = "Invalid Email or Password.";

        }

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

    <div class="row justify-content-center align-items-center vh-100">

        <div class="col-md-5">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">

                    <h3>Student Login</h3>

                </div>

                <div class="card-body">

                    <?php

                    if ($error != "") {

                    ?>

                    <div class="alert alert-danger">

                        <?php echo $error; ?>

                    </div>

                    <?php

                    }

                    ?>

                    <form method="POST" action="login.php">

                        <div class="mb-3">

                            <label class="form-label">

                                Email Address

                            </label>

                            <input
                                type="email"
                                name="email"
                                class="form-control"
                                placeholder="Enter Email">

                        </div>

                        <div class="mb-3">

                            <label class="form-label">

                                Password

                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control"
                                placeholder="Enter Password">

                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary w-100">

                            Login

                        </button>
                        <div class="text-center mt-3">

    <a href="forgot_password.php">

        Forgot Password?

    </a>

</div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

</body>

</html>