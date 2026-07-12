<?php
include 'db.php';

// Dashboard Statistics
$total = mysqli_fetch_assoc(mysqli_query($conn,"SELECT COUNT(*) AS total FROM students"))['total'];
$avg = mysqli_fetch_assoc(mysqli_query($conn,"SELECT ROUND(AVG(cgpa),2) AS avgcgpa FROM students"))['avgcgpa'];

// Filters
$search = isset($_GET['search']) ? trim($_GET['search']) : "";
$branch = isset($_GET['branch']) ? $_GET['branch'] : "";
$status = isset($_GET['status']) ? $_GET['status'] : "Active";

$sql = "SELECT * FROM students WHERE 1";

if($status!="All")
{
    $sql .= " AND status='$status'";
}

if($branch!="")
{
    $sql .= " AND branch='$branch'";
}

if($search!="")
{
    $sql .= " AND (name LIKE '%$search%' 
    OR email LIKE '%$search%')";
}

$result=mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>

<head>

<title>Student Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<h2 class="text-center mb-4">
Student Management System
</h2>

<div class="row text-center mb-4">

<div class="col-md-6">

<div class="card bg-primary text-white">

<div class="card-body">

<h5>Total Students</h5>

<h2><?php echo $total; ?></h2>

</div>

</div>

</div>

<div class="col-md-6">

<div class="card bg-success text-white">

<div class="card-body">

<h5>Average CGPA</h5>

<h2><?php echo $avg; ?></h2>

</div>

</div>

</div>

</div>

<form method="GET" class="row g-2 mb-3">

<div class="col-md-4">

<input type="text"
class="form-control"
name="search"
placeholder="Search Student"
value="<?php echo $search; ?>">

</div>

<div class="col-md-3">

<select class="form-select" name="branch">

<option value="">All Branches</option>

<option value="CSE">CSE</option>

<option value="IT">IT</option>

<option value="Data Science">Data Science</option>

<option value="AI & ML">AI & ML</option>

</select>

</div>

<div class="col-md-3">

<select class="form-select" name="status">

<option value="Active">Active</option>

<option value="Inactive">Inactive</option>

<option value="All">All</option>

</select>

</div>

<div class="col-md-2">

<button class="btn btn-primary w-100">
Search
</button>

</div>

</form>

<a href="add.php"
class="btn btn-success mb-3">

<i class="bi bi-person-plus-fill"></i>

Add Student

</a>

<table class="table table-bordered table-hover table-striped">

<thead class="table-dark">

<tr>

<th>Photo</th>

<th>Name</th>

<th>Email</th>

<th>Branch</th>

<th>CGPA</th>

<th>Status</th>

<th>Action</th>

</tr>

</thead>

<tbody>

<?php

if(mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td>

<img src="uploads/<?php echo $row['photo'];?>"
width="70"
height="70"
class="rounded-circle">

</td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['branch']; ?></td>

<td><?php echo $row['cgpa']; ?></td>

<td>

<?php

if($row['status']=="Active")
{
echo "<span class='badge bg-success'>Active</span>";
}
else
{
echo "<span class='badge bg-danger'>Inactive</span>";
}

?>

</td>

<td>

<a href="edit.php?id=<?php echo $row['id'];?>"
class="btn btn-warning btn-sm">

<i class="bi bi-pencil-square"></i>

</a>

<a href="delete.php?id=<?php echo $row['id'];?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Are you sure?')">

<i class="bi bi-trash-fill"></i>

</a>

</td>

</tr>

<?php

}

}

else

{

?>

<tr>

<td colspan="7"
class="text-center">

No Students Found

</td>

</tr>

<?php

}

?>

</tbody>

</table>

</div>

</body>

</html>