<?php

include "db_connect.php";

$sql="SELECT * FROM students";

$result=mysqli_query($conn,$sql);

?>

<!DOCTYPE html>

<html>

<head>

<title>Student List</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white text-center">

<h2>Student List</h2>

</div>

<div class="card-body">

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Branch</th>
<th>Phone</th>
<th>Gender</th>
<th>Course</th>
<th>Address</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['branch']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['gender']; ?></td>

<td><?php echo $row['course']; ?></td>

<td><?php echo $row['address']; ?></td>

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