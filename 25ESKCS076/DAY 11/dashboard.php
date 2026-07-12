<?php
include("db_connect.php");
session_start();

// Check Login
if(!isset($_SESSION['user_id']))
{
    header("Location: index.php");
    exit();
}

// Get User Data
$id = $_SESSION['user_id'];

$query = mysqli_query($conn,"SELECT * FROM user WHERE id='$id'");
$user = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<!-- Navbar -->

<nav class="navbar navbar-dark bg-primary">

<div class="container">

<a class="navbar-brand" href="#">Student Portal</a>

<div>

<a href="profile.php" class="btn btn-light btn-sm">
Profile
</a>

<a href="change_password.php" class="btn btn-warning btn-sm">
Change Password
</a>

<a href="logout.php" class="btn btn-danger btn-sm">
Logout
</a>

</div>

</div>

</nav>

<div class="container mt-5">

<div class="card shadow">

<div class="card-body text-center">

<?php
$image = $user['profile_image'];

if($image != "" && file_exists("uploads/".$image))
{
?>
<img src="uploads/<?php echo $image; ?>"
width="150"
height="150"
class="rounded-circle border">
<?php
}
else
{
?>
<img src="https://via.placeholder.com/150"
class="rounded-circle">
<?php
}
?>

<h2 class="mt-3">
Welcome,
<?php echo $user['name']; ?>
</h2>

<p>
<b>Email :</b>
<?php echo $user['email']; ?>
</p>

<p>
<b>Account Created :</b>
<?php echo $user['created_at']; ?>
</p>

</div>

</div>

<br>

<div class="row">

<div class="col-md-4">

<div class="card bg-success text-white">

<div class="card-body">

<h4>Total Users</h4>

<?php
$total=mysqli_query($conn,"SELECT * FROM user");
?>

<h2>
<?php echo mysqli_num_rows($total); ?>
</h2>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card bg-info text-white">

<div class="card-body">

<h4>Profile Status</h4>

<p>Logged In Successfully</p>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card bg-warning">

<div class="card-body">

<h4>Assignments</h4>

<p>Complete PHP Project</p>

</div>

</div>

</div>

</div>

</div>

</body>

</html>
