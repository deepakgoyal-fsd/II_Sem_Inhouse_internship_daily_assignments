<?php
include("session.php");
include("db_connect.php");

$search = "";

if(isset($_GET['search'])){
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $query = "SELECT * FROM users
              WHERE name LIKE '%$search%'
              OR email LIKE '%$search%'
              ORDER BY id DESC";
}else{
    $query = "SELECT * FROM users ORDER BY id DESC";
}

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-4">

<div class="d-flex justify-content-between">

<h2>Student Dashboard</h2>

<a href="logout.php" class="btn btn-danger">Logout</a>

</div>

<hr>

<div class="card mb-4">

<div class="card-body">

<div class="row">

<div class="col-md-2">

<img src="uploads/<?php echo $_SESSION['image']; ?>"
width="120"
height="120"
class="rounded-circle border">

</div>

<div class="col-md-10">

<h4>Welcome,
<?php echo $_SESSION['name']; ?>
</h4>

<p>Email :
<?php echo $_SESSION['email']; ?>
</p>

</div>

</div>

</div>

</div>

<form method="GET">

<div class="input-group mb-3">

<input
type="text"
name="search"
class="form-control"
placeholder="Search by Name or Email"
value="<?php echo $search; ?>">

<button class="btn btn-primary">
Search
</button>

</div>

</form>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Image</th>
<th>Name</th>
<th>Email</th>
<th>Action</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>

<img
src="uploads/<?php echo $row['image'];?>"
width="60"
height="60"
class="rounded-circle">

</td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td>

<a
href="edit.php?id=<?php echo $row['id'];?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="delete.php?id=<?php echo $row['id'];?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete this user?')">

Delete

</a>

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
