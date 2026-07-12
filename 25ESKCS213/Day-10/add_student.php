<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Add Student</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-6">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3 class="text-center">

Add Student

</h3>

</div>

<div class="card-body">

<form action="insert_student.php" method="POST">

<div class="mb-3">

<label class="form-label">Name</label>

<input type="text" name="name" class="form-control" required>

</div>

<div class="mb-3">

<label class="form-label">Email</label>

<input type="email" name="email" class="form-control" required>

</div>

<div class="mb-3">

<label class="form-label">Branch</label>

<select name="branch" class="form-select" required>

<option value="">Select Branch</option>

<option>Computer Science</option>

<option>Information Technology</option>

<option>Mechanical</option>

<option>Civil</option>

<option>Electronics</option>

</select>

</div>

<div class="mb-3">

<label class="form-label">CGPA</label>

<input type="number" step="0.01" min="0" max="10" name="cgpa" class="form-control" required>

</div>

<button type="submit" class="btn btn-success">

Save Student

</button>

<a href="index.php" class="btn btn-secondary">

Back

</a>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>