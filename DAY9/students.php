<?php
include("db_connect.php");

$result = mysqli_query($conn, "SELECT * FROM students");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Registered Students</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="text-center text-success mb-4">
Registered Students
</h2>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Photo</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Gender</th>
<th>Course</th>
<th>Address</th>
<th>Date Registered</th>

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
<img src="uploads/<?php echo $row['photo']; ?>" width="70" height="70">
</td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['gender']; ?></td>

<td><?php echo $row['course']; ?></td>

<td><?php echo $row['address']; ?></td>

<td><?php echo $row['date_registered']; ?></td>

</tr>

<?php

}

?>

</tbody>

</table>

<a href="index.php" class="btn btn-primary">
Register New Student
</a>

</div>

</div>

</body>
</html>