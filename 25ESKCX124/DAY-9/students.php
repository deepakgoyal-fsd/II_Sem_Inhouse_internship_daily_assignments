<?php

include("db_connect.php");

?>

<!DOCTYPE html>
<html>

<head>

<title>Student Records</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style9.css">

</head>

<body>

<div class="container">

<h1>Student Records</h1>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Phone</th>

<th>Branch</th>

<th>CGPA</th>

<th>City</th>

</tr>

</thead>

<tbody>

<?php

$sql="SELECT * FROM students";

$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result))
{

if($row['cgpa']>8)
{
    echo "<tr class='table-success'>";
}
else
{
    echo "<tr>";
}

?>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['branch']; ?></td>

<td><?php echo $row['cgpa']; ?></td>

<td><?php echo $row['city']; ?></td>

</tr>

<?php

}

?>

</tbody>

</table>

<br>

<?php

$total = mysqli_num_rows($result);

echo "<h3>Total Students : ".$total."</h3>";

?>

<br>

<a href="index.php">← Register New Student</a>

</div>

</body>

</html>