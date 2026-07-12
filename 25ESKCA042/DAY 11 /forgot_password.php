<?php
$message = "";

if(isset($_POST['send']))
{
    $email = $_POST['email'];

    if($email!="")
    {
        $message="<div class='alert alert-success'>
        Password reset link sent successfully! (Demo)
        </div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Forgot Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5" style="max-width:450px;">

<div class="card shadow p-4">

<h2 class="text-center">Forgot Password</h2>

<?php echo $message; ?>

<form method="post">

<label>Email</label>

<input
type="email"
name="email"
class="form-control mb-3"
placeholder="Enter Email"
required>

<button
type="submit"
name="send"
class="btn btn-primary w-100">
Send Reset Link
</button>

</form>

<br>

<a href="index.php" class="btn btn-secondary w-100">
Back to Login
</a>

</div>

</div>

</body>

</html>
