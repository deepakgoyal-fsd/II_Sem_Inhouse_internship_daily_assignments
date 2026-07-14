<?php
include("db.php");

if (!isset($_GET['roll_no'])) {
    header("Location: students.php");
    exit();
}

$roll_no = $_GET['roll_no'];

$stmt = $conn->prepare("SELECT * FROM students WHERE roll_no = ?");
$stmt->bind_param("i", $roll_no);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header("Location: students.php");
    exit();
}

$row = $result->fetch_assoc();

if (isset($_POST['update'])) {

    $name = trim($_POST['name']);
    $roll_no = trim($_POST['roll_no']);
    $department = trim($_POST['department']);
    $semester = (int)$_POST['semester'];
    $section = trim($_POST['section']);
    $cgpa = (float)$_POST['cgpa'];

    $update = $conn->prepare("UPDATE students SET
        name=?,
        roll_no=?,
        department=?,
        semester=?,
        section=?,
        cgpa=?
        WHERE roll_no=?");

    $update->bind_param(
        "sssisdi",
        $name,
        $roll_no,
        $department,
        $semester,
        $section,
        $cgpa,
    
    );

    if ($update->execute()) {
        header("Location: students.php?msg=updated");
        exit();
    } else {
        echo "<div class='alert alert-danger'>Update Failed!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Edit Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning text-dark">

<h3>
<i class="bi bi-pencil-square"></i>
Edit Student
</h3>

</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label class="form-label">Student Name</label>
<input type="text"
name="name"
class="form-control"
value="<?php echo htmlspecialchars($row['name']); ?>"
required>
</div>

<div class="mb-3">
<label class="form-label">Roll Number</label>
<input type="text"
name="roll_no"
class="form-control"
value="<?php echo htmlspecialchars($row['roll_no']); ?>"
required>
</div>

<div class="mb-3">
<label class="form-label">Department</label>
<input type="text"
name="department"
class="form-control"
value="<?php echo htmlspecialchars($row['department']); ?>"
required>
</div>

<div class="mb-3">
<label class="form-label">Semester</label>
<input type="number"
name="semester"
class="form-control"
min="1"
max="8"
value="<?php echo htmlspecialchars($row['semester']); ?>"
required>
</div>

<div class="mb-3">
<label class="form-label">Section</label>
<input type="text"
name="section"
class="form-control"
value="<?php echo htmlspecialchars($row['section']); ?>"
required>
</div>

<div class="mb-3">
<label class="form-label">CGPA</label>
<input type="number"
name="cgpa"
step="0.01"
min="0"
max="10"
class="form-control"
value="<?php echo htmlspecialchars($row['cgpa']); ?>"
required>
</div>

<button type="submit" name="update" class="btn btn-success">
<i class="bi bi-check-circle-fill"></i>
Update Student
</button>

<a href="students.php" class="btn btn-secondary">
<i class="bi bi-arrow-left"></i>
Back
</a>

</form>

</div>

</div>

</div>

</body>

</html>