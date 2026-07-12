<?php

session_start();

if(!isset($_SESSION['username'])){

header("Location: login.php");

}

include("db_connect.php");

$search="";

if(isset($_GET['q'])){

$search=$_GET['q'];

$result=mysqli_query($conn,"SELECT * FROM students

WHERE name LIKE '%$search%'

OR branch LIKE '%$search%'");

}

else{

$result=mysqli_query($conn,"SELECT * FROM students");

}

?>

<!DOCTYPE html>

<html>

<head>

<title>Students</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Student Management</h2>

<a href="register.php" class="btn btn-success mb-3">

Add Student

</a>

<a href="logout.php" class="btn btn-danger mb-3">

Logout

</a>

<form method="GET">

<input type="text" name="q" class="form-control mb-3" placeholder="Search Student">

</form>

<table class="table table-bordered table-striped">

<tr>

<th>Photo</th>

<th>Name</th>

<th>Email</th>

<th>Branch</th>

<th>Phone</th>

<th>Edit</th>

<th>Delete</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td>

<img src="uploads/<?php echo $row['photo']; ?>" width="60">

</td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['branch']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">

Edit

</a>

</td>

<td>

<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">

Delete

</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>

</html>