<?php include("db_connect.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="text-center text-primary mb-4">
Student Registration Form
</h2>

<form action="register.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Phone Number</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Gender</label><br>

<input type="radio" name="gender" value="Male" required> Male

<input type="radio" name="gender" value="Female" class="ms-3"> Female

</div>

<div class="mb-3">
<label class="form-label">Course</label>

<select name="course" class="form-select" required>
<option value="">Select Course</option>
<option>B.Tech AI</option>
<option>B.Tech CSE</option>
<option>B.Tech IT</option>
<option>BCA</option>
</select>

</div>

<div class="mb-3">
<label class="form-label">Address</label>

<textarea name="address" class="form-control" rows="3" required></textarea>

</div>

<div class="mb-3">
<label class="form-label">Profile Photo</label>

<input type="file" name="photo" class="form-control" required>

</div>

<button type="submit" class="btn btn-primary w-100">
Register Student
</button>

</form>

<br>

<a href="students.php" class="btn btn-success w-100">
View All Students
</a>

</div>

</div>

</body>
</html>