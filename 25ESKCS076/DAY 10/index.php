<?php
include("db_connect.php");

// Dashboard
$total = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS total FROM students"));
$avg = mysqli_fetch_assoc(mysqli_query($conn, "SELECT AVG(cgpa) AS avgcgpa FROM students"));

// Search & Filter
$search = isset($_GET['search']) ? $_GET['search'] : "";
$branch = isset($_GET['branch']) ? $_GET['branch'] : "";

$sql = "SELECT * FROM students WHERE 1";

if ($search != "") {
    $sql .= " AND (name LIKE '%$search%' OR email LIKE '%$search%' OR branch LIKE '%$search%')";
}

if ($branch != "") {
    $sql .= " AND branch='$branch'";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Management System</title>
<link rel="stylesheet" href="css/style.css">
</head>

<body>

<h1 align="center">Student Management System</h1>

<div class="dashboard">
<div class="card">
<h2><?php echo $total['total']; ?></h2>
<p>Total Students</p>
</div>

<div class="card">
<h2><?php echo number_format($avg['avgcgpa'],2); ?></h2>
<p>Average CGPA</p>
</div>
</div>

<h2>Add Student</h2>

<form action="add_student.php" method="POST" enctype="multipart/form-data">

<input type="text" name="name" placeholder="Name" required>

<input type="email" name="email" placeholder="Email" required>

<select name="branch" required>
<option value="">Select Branch</option>
<option>CSE</option>
<option>IT</option>
<option>ECE</option>
<option>ME</option>
<option>Civil</option>
</select>

<input type="number" step="0.01" name="cgpa" placeholder="CGPA" required>

<input type="file" name="photo">

<select name="status">
<option>Active</option>
<option>Inactive</option>
</select>

<button type="submit">Add Student</button>

</form>

<hr>

<form method="GET">

<input type="text" name="search" placeholder="Search">

<select name="branch">

<option value="">All Branches</option>
<option>CSE</option>
<option>IT</option>
<option>ECE</option>
<option>ME</option>
<option>Civil</option>

</select>

<button type="submit">Filter</button>

</form>

<br>

<table border="1" width="100%" cellspacing="0">

<tr>

<th>Photo</th>
<th>Name</th>
<th>Email</th>
<th>Branch</th>
<th>CGPA</th>
<th>Status</th>
<th>Edit</th>
<th>Delete</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td>
<img src="upload/<?php echo $row['photo']; ?>" width="60">
</td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['branch']; ?></td>

<td><?php echo $row['cgpa']; ?></td>

<td><?php echo $row['status']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>

</td>

<td>

<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>

</td>

</tr>

<?php
}
?>

</table>

</body>
</html>
