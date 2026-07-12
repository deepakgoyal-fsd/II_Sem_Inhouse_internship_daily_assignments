<?php

include("db_connect.php");

$sql="SELECT * FROM students ORDER BY id DESC";

$result=mysqli_query($conn,$sql);

$total=mysqli_num_rows($result);

?>

<!DOCTYPE html>

<html>

<head>

<title>Student List</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<nav class="navbar navbar-dark bg-dark rounded mb-4">

<div class="container-fluid">

<span class="navbar-brand">

Student Registration Portal

</span>

<a href="register.php" class="btn btn-light">

Register Student

</a>

</div>

</nav>

<h3 class="mb-3">

Registered Students

</h3>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Photo</th>

<th>Name</th>

<th>Email</th>

<th>Branch</th>

<th>CGPA</th>

<th>Phone</th>

<th>City</th>

<th>Course</th>

<th>Address</th>

<th>Date Registered</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0){

while($row=mysqli_fetch_assoc($result)){

$class="";

if($row['cgpa']>8.0){

$class="table-success";

}

?>

<tr class="<?php echo $class; ?>">

<td><?php echo $row['id']; ?></td>

<td>

<img

src="uploads/<?php echo $row['photo']; ?>"

width="60"

height="60">

</td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['branch']; ?></td>

<td><?php echo $row['cgpa']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['city']; ?></td>

<td><?php echo $row['course']; ?></td>

<td><?php echo $row['address']; ?></td>

<td><?php echo $row['date_registered']; ?></td>

</tr>

<?php

}

}

else{

?>

<tr>

<td colspan="11" class="text-center">

No Students Found

</td>

</tr>

<?php

}

?>

</tbody>

</table>

<div class="alert alert-info">

<b>Total Students :</b>

<?php echo $total; ?>

</div>

</div>

</body>

</html>