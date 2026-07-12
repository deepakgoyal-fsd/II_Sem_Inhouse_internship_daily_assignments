<?php
include("db_connect3.php");

// Total Students
$countQuery = "SELECT COUNT(*) AS total FROM students";
$countResult = mysqli_query($conn, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);

// Highest CGPA
$maxQuery = "SELECT MAX(cgpa) AS maxcgpa FROM students";
$maxResult = mysqli_query($conn, $maxQuery);
$maxRow = mysqli_fetch_assoc($maxResult);
$highestCGPA = $maxRow['maxcgpa'];

// Fetch Students
$sql = "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Student Records</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f4f6f9;
}

.navbar{
    box-shadow:0 3px 10px rgba(0,0,0,.3);
}

.table{
    background:white;
}

.highest{
    background:#d4edda !important;
    font-weight:bold;
}

.counter{
    font-size:20px;
    font-weight:bold;
}
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">

<a class="navbar-brand fw-bold">
🎓 Student Registration Portal
</a>

<a href="DAY8index.php" class="btn btn-success">
+ Add Student
</a>

</div>
</nav>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<div class="d-flex justify-content-between">

<h3>Student Records</h3>

<span class="counter">
Total Students :
<?php echo $countRow['total']; ?>
</span>

</div>

</div>

<div class="card-body">

<table class="table table-bordered table-hover text-center">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Course</th>
<th>CGPA</th>
<th>Date</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{

$class="";

if($row['cgpa']==$highestCGPA)
{
$class="highest";
}

?>

<tr class="<?php echo $class; ?>">

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['phone']; ?></td>

<td><?php echo $row['course']; ?></td>

<td><?php echo $row['cgpa']; ?></td>

<td><?php echo $row['created_at']; ?></td>

</tr>

<?php
}
}
else
{
?>

<tr>

<td colspan="7" class="text-danger fw-bold">

No Student Records Found

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

<?php
mysqli_close($conn);
?>