<?php
include("db_connect.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM students WHERE id='$id'");
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="text-center text-primary">
Edit Student
</h2>

<form action="update_student.php" method="POST" enctype="multipart/form-data">

<input type="hidden" name="id" value="<?php echo $row['id']; ?>">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control"
value="<?php echo $row['name']; ?>" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control"
value="<?php echo $row['email']; ?>" required>
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control"
value="<?php echo $row['phone']; ?>" required>
</div>

<div class="mb-3">
<label>CGPA</label>
<input type="number" step="0.01" name="cgpa"
class="form-control"
value="<?php echo $row['cgpa']; ?>" required>
</div>

<div class="mb-3">
<label>Course</label>
<input type="text" name="course"
class="form-control"
value="<?php echo $row['course']; ?>" required>
</div>

<div class="mb-3">
<label>Address</label>
<textarea name="address" class="form-control" required><?php echo $row['address']; ?></textarea>
</div>

<button class="btn btn-success w-100">
Update Student
</button>

</form>

</div>

</div>

</body>
</html>