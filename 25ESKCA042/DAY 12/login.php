<?php
session_start();
include("db_connect.php");

$error = "";

if(isset($_POST['login'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    if($email == "" || $password == ""){
        $error = "<div class='alert alert-danger'>All fields are required.</div>";
    }
    else{

        $select = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $select);

        if(mysqli_num_rows($result) > 0){

            $row = mysqli_fetch_assoc($result);

            if(password_verify($password, $row['password'])){

                $_SESSION['user_id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['image'] = $row['image'];

                header("Location: dashboard.php");
                exit();

            }else{
                $error = "<div class='alert alert-danger'>Invalid Password!</div>";
            }

        }else{
            $error = "<div class='alert alert-danger'>Email not found!</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow mx-auto" style="max-width:450px;">

<div class="card-body">

<h2 class="text-center mb-4">Student Login</h2>

<?php echo $error; ?>

<form method="POST">

<label>Email</label>
<input type="email" name="email" class="form-control mb-3" required>

<label>Password</label>
<input type="password" name="password" class="form-control mb-3" required>

<input type="submit" name="login" value="Login" class="btn btn-success w-100">

</form>

<br>

<p class="text-center">
Don't have an account?
<a href="register.php">Register</a>
</p>

</div>

</div>

</div>

</body>
</html>
