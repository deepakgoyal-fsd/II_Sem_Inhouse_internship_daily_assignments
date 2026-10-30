<!DOCTYPE html>
<html>
<head>
<title>Student Registration Form</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h2>Student Registration Form</h2>
</div>

<div class="card-body">

<form action="process_form.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Full Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Roll No</label>
<input type="text" name="roll" class="form-control">
</div>

<div class="mb-3">
<label>Branch</label>
<input type="text" name="branch" class="form-control" required>
</div>

<div class="mb-3">
<label>CGPA</label>
<input type="number" step="0.01" name="cgpa" class="form-control" required>
</div>

<div class="mb-3">
<label>Course</label>
<select name="course" class="form-select">
<option>B.Tech</option>
<option>BCA</option>
<option>BBA</option>
<option>MCA</option>
<option>MBA</option>
</select>
</div>

<div class="mb-3">
<label>Address</label>
<textarea name="address" class="form-control"></textarea>
</div>

<div class="mb-3">
<label>Student Photo</label>
<input type="file" name="photo" class="form-control">
</div>

<button class="btn btn-primary">
Register
</button>

</form>

</div>

</div>

</div>

</body>
</html>