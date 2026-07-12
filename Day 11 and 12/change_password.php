<?php
include("auth.php");
include("db.php");

$message = "";

$user_id = $_SESSION['user_id'];

if(isset($_POST['change_password']))
{
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Get current password from database
    $sql = "SELECT password FROM users WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if($current_password != $user['password'])
    {
        $message = "<div class='alert alert-danger'>Current Password is Incorrect.</div>";
    }
    elseif($new_password != $confirm_password)
    {
        $message = "<div class='alert alert-warning'>New Password and Confirm Password do not match.</div>";
    }
    else
    {
        $update = "UPDATE users SET password = ? WHERE user_id = ?";
        $stmt = mysqli_prepare($conn, $update);
        mysqli_stmt_bind_param($stmt, "si", $new_password, $user_id);
        if(mysqli_stmt_execute($stmt))
        {
            $message = "<div class='alert alert-success'>Password Changed Successfully.</div>";
        }
        else
        {
            $message = "<div class='alert alert-danger'>Something went wrong.</div>";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<nav class="navbar navbar-dark bg-primary">
<div class="container">
<a class="navbar-brand" href="dashboard.php">
Student Management System
</a>

<a href="logout.php" class="btn btn-light btn-sm">
Logout
</a>

</div>
</nav>

<div class="container mt-5">
<div class="row justify-content-center">
<div class="col-md-6">
<div class="card">
<div class="card-header bg-warning">

<h4>Change Password</h4>

</div>
<div class="card-body">
<?php echo $message; ?>
<form method="POST">
<div class="mb-3">
<label>Current Password</label>

<input
type="password"
name="current_password"
class="form-control"
required>
</div>

<div class="mb-3">
<label>New Password</label>
<input
type="password"
name="new_password"
class="form-control"
required>
</div>

<div class="mb-3">
<label>Confirm Password</label>
<input
type="password"
name="confirm_password"
class="form-control"
required>
</div>

<button
type="submit"
name="change_password"
class="btn btn-warning">
Change Password
</button>
<a href="dashboard.php" class="btn btn-secondary">
Back

</a>
</form>
</div>
</div>
</div>
</div>
</div>
</body>
</html>