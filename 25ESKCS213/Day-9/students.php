<?php

include("db_connect.php");

$result = mysqli_query($conn,"SELECT * FROM students ORDER BY id DESC");

$total = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Students List</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h2 class="text-center">

Registered Students

</h2>

</div>

<div class="card-body">

<div class="d-flex justify-content-between mb-3">

<a href="index.php" class="btn btn-primary">

Register New Student

</a>

<span class="badge bg-dark fs-5">

Total Students : <?php echo $total; ?>

</span>

</div>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Branch</th>

<th>CGPA</th>

<th>Phone</th>

<th>City</th>

<th>Registered On</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result)){

$class="";

if($row["cgpa"]>8){

$class="table-success";

}

?>

<tr class="<?php echo $class; ?>">

<td><?php echo $row["id"]; ?></td>

<td><?php echo $row["name"]; ?></td>

<td><?php echo $row["email"]; ?></td>

<td><?php echo $row["branch"]; ?></td>

<td><?php echo $row["cgpa"]; ?></td>

<td><?php echo $row["phone"]; ?></td>

<td><?php echo $row["city"]; ?></td>

<td><?php echo $row["created_at"]; ?></td>

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