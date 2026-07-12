<?php
session_start();
include("db_connect.php");

if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit();
}

$search = "";

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

$sql = "SELECT * FROM users WHERE name LIKE '%$search%'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f5f5f5;
}
.card{
    border-radius:15px;
}
table{
    margin-top:20px;
}
img{
    object-fit:cover;
}
</style>

</head>

<body>

<nav class="navbar navbar-dark bg-dark">
<div class="container">

<a class="navbar-brand">
Student Dashboard
</a>

<a href="logout.php" class="btn btn-danger">
Logout
</a>

</div>
</nav>

<div class="container mt-5">

<div class="card shadow">

<div class="card-body text-center">

<?php
if($_SESSION['photo']!="")
{
?>
<img src="uploads/<?php echo $_SESSION['photo'];?>"
width="120"
height="120"
class="rounded-circle mb-3">
<?php
}
?>

<h2>Welcome</h2>

<h3><?php echo $_SESSION['name']; ?></h3>

</div>

</div>

<div class="mt-4">

<form method="GET">

<div class="input-group">

<input
type="text"
name="search"
class="form-control"
placeholder="Search by Name"
value="<?php echo $search; ?>">

<button class="btn btn-primary">
Search
</button>

</div>

</form>

</div>

<table class="table table-striped table-hover shadow bg-white">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Photo</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td>

<?php
if($row['photo']!="")
{
?>

<img src="uploads/<?php echo $row['photo'];?>"
width="60"
height="60"
class="rounded-circle">

<?php
}
else
{
echo "No Photo";
}
?>

</td>

</tr>

<?php
}
?>

</tbody>

</table>

</div>

</body>
</html>