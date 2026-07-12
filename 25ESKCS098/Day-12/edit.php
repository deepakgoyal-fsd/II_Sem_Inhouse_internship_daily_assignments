<?php

session_start();

if(!isset($_SESSION['username'])){

header("Location: login.php");

}

include("db_connect.php");

$id=$_GET['id'];

$result=mysqli_query($conn,"SELECT * FROM students WHERE id=$id");

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

<form action="update.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<input type="text" name="name" class="form-control mb-3" value="<?php echo $row['name']; ?>">

<input type="email" name="email" class="form-control mb-3" value="<?php echo $row['email']; ?>">

<input type="text" name="branch" class="form-control mb-3" value="<?php echo $row['branch']; ?>">

<input type="text" name="phone" class="form-control mb-3" value="<?php echo $row['phone']; ?>">

<input type="file" name="photo" class="form-control mb-3">

<button class="btn btn-success">

Update Student

</button>

<a href="students.php" class="btn btn-secondary">

Back

</a>

</form>

</div>

</body>

</html>