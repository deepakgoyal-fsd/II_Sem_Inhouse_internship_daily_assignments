<?php
include("db_connect.php");

$message = "";

if(isset($_POST['change']))
{
    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    $result = mysqli_query($conn, "SELECT * FROM users LIMIT 1");
    $user = mysqli_fetch_assoc($result);

    if($current != $user['password'])
    {
        $message = "<div class='alert alert-danger'>Current Password is incorrect.</div>";
    }
    elseif($new != $confirm)
    {
        $message = "<div class='alert alert-warning'>New Password and Confirm Password do not match.</div>";
    }
    else
    {
        mysqli_query($conn, "UPDATE users SET password='$new' LIMIT 1");

        $message = "<div class='alert alert-success'>Password changed successfully.</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Change Password</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="text-center text-primary">
Change Password
</h2>

<?php echo $message; ?>

<form method="POST">

<div class="mb-3">
<label>Current Password</label>
<input type="password" name="current_password" class="form-control" required>
</div>

<div class="mb-3">
<label>New Password</label>
<input type="password" name="new_password" class="form-control" required>
</div>

<div class="mb-3">
<label>Confirm Password</label>
<input type="password" name="confirm_password" class="