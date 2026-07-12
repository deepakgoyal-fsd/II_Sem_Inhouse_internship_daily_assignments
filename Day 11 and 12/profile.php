<?php
include("auth.php");
include("db.php");

// Get logged-in user
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $sql);

mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>

<head>

    <title>My Profile</title>
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
<div class="card-header bg-success text-white">

<h4>My Profile</h4>

</div>
<div class="card-body">
<table class="table table-bordered">

<tr>
<th>User ID</th>
<td><?php echo $user['user_id']; ?></td>
</tr>

<tr>
<th>Full Name</th>
<td><?php echo $user['full_name']; ?></td>
</tr>

<tr>
<th>Email</th>
<td><?php echo $user['email']; ?></td>
</tr>

<tr>
<th>Status</th>
<td><?php echo $user['status']; ?></td>
</tr>

<tr>
<th>Last Login</th>
<td>
<?php
if($user['last_login'] != NULL)
{
    echo date("d-m-Y h:i A", strtotime($user['last_login']));
}
else
{
    echo "First Login";
}
?>

</td>
</tr>
</table>
<div class="text-center">
<a href="dashboard.php" class="btn btn-primary">

Back to Dashboard
</a>
<a href="change_password.php" class="btn btn-warning">
Change Password
</a>

</div>
</div>
</div>
</div>
</div>
</div>
</body>

</html>