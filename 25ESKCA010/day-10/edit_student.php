<?php

include("db_connect.php");

$id = $_GET["id"];

$result = mysqli_query($conn,"SELECT * FROM students WHERE id=$id");

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-warning">

<h3 class="text-center">

Edit Student

</h3>

</div>

<div class="card-body">

<form action="update_student.php" method="POST">

<input type="hidden" name="id" value="<?php echo $row["id"]; ?>">

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
value="<?php echo $row["name"]; ?>"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
value="<?php echo $row["email"]; ?>"
required>

</div>

<div class="mb-3">

<label>Branch</label>

<input
type="text"
name="branch"
class="form-control"
value="<?php echo $row["branch"]; ?>"
required>

</div>

<div class="mb-3">

<label>CGPA</label>

<input
type="number"
step="0.01"
name="cgpa"
class="form-control"
value="<?php echo $row["cgpa"]; ?>"
required>

</div>

<button class="btn btn-warning">

Update Student

</button>

<a href="index.php" class="btn btn-secondary">

Cancel

</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>