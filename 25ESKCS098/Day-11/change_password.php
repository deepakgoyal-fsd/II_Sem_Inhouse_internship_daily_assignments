<?php

session_start();

if(!isset($_SESSION['user_id'])){

header("Location: login.php");

exit();

}

include("db_connect.php");

$message="";

if(isset($_POST['change'])){

$current=$_POST['current_password'];

$new=$_POST['new_password'];

$confirm=$_POST['confirm_password'];

$id=$_SESSION['user_id'];

$result=mysqli_query($conn,"SELECT * FROM users WHERE id=$id");

$user=mysqli_fetch_assoc($result);

if($current!=$user['password']){

$message="Current Password is Wrong";

}

else if($new!=$confirm){

$message="Passwords Do Not Match";

}

else{

mysqli_query($conn,"UPDATE users SET password='$new' WHERE id=$id");

$message="Password Changed Successfully";

}

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Change Password</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Change Password</h2>

<p class="text-success"><?php echo $message; ?></p>

<form method="POST">

<input
type="password"
name="current_password"
class="form-control mb-3"
placeholder="Current Password"
required>

<input
type="password"
name="new_password"
class="form-control mb-3"
placeholder="New Password"
required>

<input
type="password"
name="confirm_password"
class="form-control mb-3"
placeholder="Confirm Password"
required>

<button
type="submit"
name="change"
class="btn btn-primary">

Change Password

</button>

</form>

<br>

<a href="dashboard.php" class="btn btn-secondary">

Back

</a>

</div>

</body>

</html>