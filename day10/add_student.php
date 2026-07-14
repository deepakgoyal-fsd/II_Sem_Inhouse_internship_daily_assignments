<?php
include("db.php");

if(isset($_POST['save']))
{
    $name = $_POST['name'];
    $roll_no = $_POST['roll_no'];
    $department = $_POST['department'];
    $semester = $_POST['semester'];
    $section = $_POST['section'];
    $cgpa = $_POST['cgpa'];

    $stmt = $conn->prepare("INSERT INTO students( roll_no, department, semester, section, cgpa) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssisd", $name, $roll_no, $department, $semester, $section, $cgpa);

    if($stmt->execute())
    {
        header("Location: students.php?msg=added");
        exit();
    }
    else
    {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Add Student</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label class="form-label">Student Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Roll No</label>
<input type="text" name="roll_no" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Department</label>
<input type="text" name="department" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Semester</label>
<input type="number" name="semester" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Section</label>
<input type="text" name="section" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">CGPA</label>
<input type="number" step="0.01" min="0" max="10" name="cgpa" class="form-control" required>
</div>

<button type="submit" name="save" class="btn btn-success">
Save Student
</button>

<a href="students.php" class="btn btn-secondary">
Back
</a>

</form>

</div>

</div>

</div>

</body>

</html>