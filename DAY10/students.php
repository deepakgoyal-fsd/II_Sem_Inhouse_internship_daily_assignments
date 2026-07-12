<?php
include("db_connect.php");

// Dashboard
$totalResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM students");
$totalRow = mysqli_fetch_assoc($totalResult);

$avgResult = mysqli_query($conn, "SELECT AVG(cgpa) AS avgcgpa FROM students");
$avgRow = mysqli_fetch_assoc($avgResult);

// Search & Filter
$search = $_GET['search'] ?? "";
$course = $_GET['course'] ?? "";

$sql = "SELECT * FROM students WHERE 1=1";

if($search != ""){
    $sql .= " AND (name LIKE '%$search%' OR email LIKE '%$search%' OR course LIKE '%$search%')";
}

if($course != ""){
    $sql .= " AND course='$course'";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Students</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container mt-5">

<h2 class="text-center text-primary mb-4">
Student Dashboard
</h2>

<div class="row mb-4">

<div class="col-md-6">
<div class="card bg-primary text-white p-3">
<h4>Total Students</h4>
<h2><?php echo $totalRow['total']; ?></h2>
</div>
</div>

<div class="col-md-6">
<div class="card bg-success text-white p-3">
<h4>Average CGPA</h4>
<h2><?php echo round($avgRow['avgcgpa'],2); ?></h2>
</div>
</div>

</div>

<form method="GET" class="row mb-4">

<div class="col-md-5">
<input type="text" name="search" class="form-control"
placeholder="Search by Name, Email or Course"
value="<?php echo $search; ?>">
</div>

<div class="col-md-4">
<select name="course" class="form-select">
<option value="">All Courses</option>
<option>B.Tech AI</option>
<option>B.Tech CSE</option>
<option>B.Tech IT</option>
<option>BCA</option>
</select>
</div>

<div class="col-md-3">
<button class="btn btn-primary w-100">
Search
</button>
</div>

</form>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Photo</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>CGPA</th>
<th>Gender</th>
<th>Course</th>
<th>Status</th>
<th>Address</th>
<th>Date</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>
<img src="uploads/<?php echo $row['photo']; ?>" width="60" height="60">
</td>

<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['cgpa']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td><?php echo $row['course']; ?></td>
<td><?php echo $row['status']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['date_registered']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

<a href="index.php" class="btn btn-success">
Register New Student
</a>

</div>

</body>
</html><?php
include("db_connect.php");

// Dashboard
$totalResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM students");
$totalRow = mysqli_fetch_assoc($totalResult);

$avgResult = mysqli_query($conn, "SELECT AVG(cgpa) AS avgcgpa FROM students");
$avgRow = mysqli_fetch_assoc($avgResult);

// Search & Filter
$search = $_GET['search'] ?? "";
$course = $_GET['course'] ?? "";

$sql = "SELECT * FROM students WHERE 1=1";

if($search != ""){
    $sql .= " AND (name LIKE '%$search%' OR email LIKE '%$search%' OR course LIKE '%$search%')";
}

if($course != ""){
    $sql .= " AND course='$course'";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>Students</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container mt-5">

<h2 class="text-center text-primary mb-4">
Student Dashboard
</h2>

<div class="row mb-4">

<div class="col-md-6">
<div class="card bg-primary text-white p-3">
<h4>Total Students</h4>
<h2><?php echo $totalRow['total']; ?></h2>
</div>
</div>

<div class="col-md-6">
<div class="card bg-success text-white p-3">
<h4>Average CGPA</h4>
<h2><?php echo round($avgRow['avgcgpa'],2); ?></h2>
</div>
</div>

</div>

<form method="GET" class="row mb-4">

<div class="col-md-5">
<input type="text" name="search" class="form-control"
placeholder="Search by Name, Email or Course"
value="<?php echo $search; ?>">
</div>

<div class="col-md-4">
<select name="course" class="form-select">
<option value="">All Courses</option>
<option>B.Tech AI</option>
<option>B.Tech CSE</option>
<option>B.Tech IT</option>
<option>BCA</option>
</select>
</div>

<div class="col-md-3">
<button class="btn btn-primary w-100">
Search
</button>
</div>

</form>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>
<th>Photo</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>CGPA</th>
<th>Gender</th>
<th>Course</th>
<th>Status</th>
<th>Address</th>
<th>Date</th>

</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td>
<img src="uploads/<?php echo $row['photo']; ?>" width="60" height="60">
</td>

<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['cgpa']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td><?php echo $row['course']; ?></td>
<td><?php echo $row['status']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['date_registered']; ?></td>

</tr>

<?php } ?>

</tbody>

</table>

<a href="index.php" class="btn btn-success">
Register New Student
</a>

</div>

</body>
</html>