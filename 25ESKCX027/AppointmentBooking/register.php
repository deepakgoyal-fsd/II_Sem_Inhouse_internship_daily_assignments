<?php
include 'includes/config.php';

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if($password != $confirm_password)
    {
        echo "<script>alert('Passwords do not match!');</script>";
    }
    else
    {
        // Check if email already exists
        $check = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $check);

        if(mysqli_num_rows($result) > 0)
        {
            echo "<script>alert('Email already registered!');</script>";
        }
        else
        {
            $sql = "INSERT INTO users(name,email,password)
                    VALUES('$name','$email','$password')";

            if(mysqli_query($conn, $sql))
            {
                echo "<script>
                        alert('Registration Successful!');
                        window.location='login.php';
                      </script>";
            }
            else
            {
                echo "<script>alert('Registration Failed!');</script>";
            }
        }
    }
}

include 'includes/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>User Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="container mt-5 mb-5">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card shadow">

                <div class="card-header bg-primary text-white text-center">
                    <h3>Create Account</h3>
                </div>

                <div class="card-body">

                    <form method="POST">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" name="register" class="btn btn-primary">
                                Register
                            </button>
                        </div>

                    </form>

                    <hr>

                    <p class="text-center">
                        Already have an account?
                        <a href="login.php">Login Here</a>
                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
include 'includes/footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>