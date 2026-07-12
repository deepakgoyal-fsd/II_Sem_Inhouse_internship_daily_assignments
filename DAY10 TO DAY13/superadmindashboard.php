<?php
session_start();
include("db.php");

if(!isset($_SESSION['id']))
{
    header("Location: login.php");
    exit();
}

if($_SESSION['role'] != "superadmin")
{
    header("Location: login.php");
    exit();
}

$result = mysqli_query($conn,"SELECT id,name,email,role FROM user ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Super Admin Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#eef2f7;
}

.navbar{
    box-shadow:0 3px 10px rgba(0,0,0,.3);
}

.card{
    border-radius:15px;
}

</style>

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">

<div class="container">

<a class="navbar-brand fw-bold">
👑 Super Admin Dashboard
</a>

<div>

<span class="text-white me-3">
Welcome,
<strong><?php echo $_SESSION['name']; ?></strong>
</span>

<a href="updatepassword.php" class="btn btn-warning me-2">
Update Password
</a>

<a href="logout.php" class="btn btn-light">
Logout
</a>

</div>

</div>

</nav>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-danger text-white">

<h3>All Registered Users</h3>

</div>

<div class="card-body">

<table class="table table-bordered table-hover text-center">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Role</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0)
{
    while($row=mysqli_fetch_assoc($result))
    {
?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo ucfirst($row['role']); ?></td>

<td>

<a href="edituser.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">
Edit
</a>

<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure you want to delete this user?');">
Delete
</a>

</td>

</tr>

<?php
    }
}
else
{
?>

<tr>

<td colspan="5" class="text-danger fw-bold">
No Users Found
</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</div>

</div>

</body>

</html>