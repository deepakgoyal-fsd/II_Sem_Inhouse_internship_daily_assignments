<?php

$message = "";

if(isset($_POST['reset']))
{
    $email = trim($_POST['email']);

    if(empty($email))
    {
        $message = "<div class='alert alert-danger'>Please enter your email address.</div>";
    }
    else
    {
        $message = "<div class='alert alert-success'>Password reset request submitted successfully.</div>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
<div class="row justify-content-center">
<div class="col-md-5">
<div class="card mt-5">
<div class="card-header bg-primary text-white text-center">
<h3>Forgot Password</h3>
</div>
<div class="card-body">
<?php echo $message; ?>
<form method="POST">
<div class="mb-3">
<label>Email Address</label>

<input
type="email"
name="email"
class="form-control"
placeholder="Enter your email"
required>

</div>

<div class="d-grid">

<button
type="submit"
name="reset"
class="btn btn-primary">

Submit

</button>
</div>
</form>
<hr>
<div class="text-center">

<a href="login.php">

Back to Login

</a>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>