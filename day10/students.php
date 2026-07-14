<?php
include("db.php");

$search = "";

if(isset($_GET['search']) && $_GET['search'] != "")
{
    $search = $_GET['search'];

    $stmt = $conn->prepare("SELECT * FROM students WHERE roll_no LIKE ? OR department LIKE ? ORDER BY roll_no DESC");
    $term = "%$search%";
    $stmt->bind_param("ss", $term, $term);
    $stmt->execute();
    $result = $stmt->get_result();
}
else
{
    $result = $conn->query("SELECT * FROM students ORDER BY roll_no DESC");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Management System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<h2 class="text-center mb-4">🎓 Student Management System</h2>

<a href="add_student.php" class="btn btn-success mb-3">
<i class="bi bi-plus-circle"></i> Add Student
</a>

<?php
if(isset($_GET['msg']))
{
    if($_GET['msg']=="added")
    {
        echo '<div class="alert alert-success">Student Added Successfully.</div>';
    }

    if($_GET['msg']=="updated")
    {
        echo '<div class="alert alert-success">Student Updated Successfully.</div>';
    }

    if($_GET['msg']=="deleted")
    {
        echo '<div class="alert alert-danger">Student Deleted Successfully.</div>';
    }
}
?>

<form method="GET" class="row mb-3">

<div class="col-md-10">

<input
type="text"
name="search"
class="form-control"
placeholder="Search by Name or Department"
value="<?php echo htmlspecialchars($search); ?>">

</div>

<div class="col-md-2">

<button class="btn btn-primary w-100">
<i class="bi bi-search"></i> Search
</button>

</div>

</form>

<div class="card shadow">

<div class="card-header bg-primary text-white d-flex justify-content-between">

<h4 class="mb-0">Student Records</h4>

<span class="badge bg-warning text-dark">
Total Students : <?php echo $result->num_rows; ?>
</span>

</div>

<div class="card-body">

<table class="table table-bordered table-striped table-hover">

<thead class="table-dark">

<tr>


<th>Name</th>
<th>Roll No</th>
<th>Department</th>
<th>Semester</th>
<th>Section</th>
<th>CGPA</th>
<th>Actions</th>

</tr>

</thead>

<tbody>

<?php

if($result->num_rows > 0)
{

while($row = $result->fetch_assoc())
{

?>

<tr>

<td><?= $row['id']; ?></td>

<td><?= htmlspecialchars($row['name']); ?></td>

<td><?= htmlspecialchars($row['roll_no']); ?></td>

<td><?= htmlspecialchars($row['department']); ?></td>

<td><?= htmlspecialchars($row['semester']); ?></td>

<td><?= htmlspecialchars($row['section']); ?></td>

<td><?= htmlspecialchars($row['cgpa']); ?></td>

<td>

<a href="edit_student.php?roll_no=<?= $row['roll_no']; ?>" class="btn btn-warning btn-sm">
<i class="bi bi-pencil-square"></i> Edit
</a>

<a href="delete_student.php?roll_no=<?= $row['roll_no']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?');">
<i class="bi bi-trash-fill"></i> Delete
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

<td colspan="8" class="text-center text-danger">

No Students Found

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>