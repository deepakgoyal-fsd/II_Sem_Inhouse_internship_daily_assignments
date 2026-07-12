<?php
session_start();
include("db_connect.php");

$error = "";

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if($email == "" || $password == ""){

        $error = "Please fill all fields.";

    }else{

        $sql = "SELECT * FROM data WHERE email='$email' LIMIT 1";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){

            $user = mysqli_fetch_assoc($result);

            if($password == $user['password']){

                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                header("Location: success.php");
                exit();

            }else{

                $error = "Incorrect Password.";

            }

        }else{

            $error = "Email not found.";

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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5" style="max-width:450px;">

<h2 class="text-center mb-4">Login</h2>

<?php
if($error != ""){
?>
<div class="alert alert-danger">
    <?php echo $error; ?>
</div>
<?php
}
?>

<form method="POST">

<div class="mb-3">

<label class="form-label">Email</label>

<input
type="email" name="email" class="form-control" required>

</div>

<div class="mb-3">

<label class="form-label">Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<input
type="submit"
name="submit"
value="Login"
class="btn btn-primary w-100">

<div class="text-center mt-3">

<a href="forgot.php">Forgot Password?</a>

</div>

<div class="text-center mt-2">

<a href="registration.php">
Don't have an account? Register
</a>

</div>

</form>

</div>

</body>
</html>