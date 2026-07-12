<?php
include("db_connect.php");

$result = mysqli_query($conn,"SELECT * FROM students ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student CRUD System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h2 class="text-center">Student Management System</h2>

</div>

<div class="card-body">

<a href="add_student.php" class="btn btn-success mb-3">

Add New Student

</a>

<table class="table table-bordered table-hover table-striped">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Branch</th>

<th>CGPA</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row["id"]; ?></td>

<td><?php echo $row["name"]; ?></td>

<td><?php echo $row["email"]; ?></td>

<td><?php echo $row["branch"]; ?></td>

<td><?php echo $row["cgpa"]; ?></td>

<td>

<a href="edit_student.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">

Edit

</a>

<a href="delete_student.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">

Delete

</a>

</td>

</tr>

<?php

}

}

else{

?>

<tr>

<td colspan="6" class="text-center">

No Student Found

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