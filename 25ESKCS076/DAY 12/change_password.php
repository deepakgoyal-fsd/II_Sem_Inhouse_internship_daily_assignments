<?php
include("db_connect.php");
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location:index.php");
    exit();
}

$id = $_SESSION['user_id'];
$message = "";

if(isset($_POST['change']))
{
    $current = mysqli_real_escape_string($conn,$_POST['current_password']);
    $new = mysqli_real_escape_string($conn,$_POST['new_password']);
    $confirm = mysqli_real_escape_string($conn,$_POST['confirm_password']);

    // Get current user
    $query = mysqli_query($conn,"SELECT * FROM user WHERE id='$id'");
    $user = mysqli_fetch_assoc($query);

    if($user['password'] != $current)
    {
        $message = "<div class='alert alert-danger'>Current Password is Incorrect.</div>";
    }
    elseif($new != $confirm)
    {
        $message = "<div class='alert alert-danger'>New Password and Confirm Password do not match.</div>";
    }
    else
    {
        $update = mysqli_query($conn,"UPDATE user SET password='$new' WHERE id='$id'");

        if($update)
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

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5" style="max-width:500px;">

<div class="card shadow p-4">

<h2 class="text-center mb-4">Change Password</h2>

<?php echo $message; ?>

<form method="POST">

<label>Current Password</label>
<input
type="password"
name="current_password"
class="form-control mb-3"
required>

<label>New Password</label>
<input
type="password"
name="new_password"
class="form-control mb-3"
required>

<label>Confirm Password</label>
<input
type="password"
name="confirm_password"
class="form-control mb-3"
required>

<button
type="submit"
name="change"
class="btn btn-success w-100">
Change Password
</button>

</form>

<br>

<a href="dashboard.php" class="btn btn-primary w-100">
Back to Dashboard
</a>

</div>

</div>

</body>
</html>
