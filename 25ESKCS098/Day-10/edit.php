<?php

include("db_connect.php");

$id=$_GET['id'];

$sql="SELECT * FROM students WHERE id=$id";

$result=mysqli_query($conn,$sql);

$row=mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2>Edit Student</h2>

<form action="update.php" method="POST">

<input
type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
value="<?php echo $row['name']; ?>"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?php echo $row['email']; ?>"
required>

</div>

<div class="mb-3">

<label>Branch</label>

<input
type="text"
name="branch"
class="form-control"
value="<?php echo $row['branch']; ?>"
required>

</div>

<div class="mb-3">

<label>CGPA</label>

<input
type="number"
step="0.01"
min="0"
max="10"
name="cgpa"
class="form-control"
value="<?php echo $row['cgpa']; ?>"
required>

</div>

<button
type="submit"
class="btn btn-success">

Update Student

</button>

<a href="students.php" class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</body>

</html>