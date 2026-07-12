<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow">

<div class="card-header bg-primary text-white">

<h2 class="text-center">

Student Registration Form

</h2>

</div>

<div class="card-body">

<form action="process_form.php" method="POST">

<div class="mb-3">

<label class="form-label">Student Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">Branch</label>

<select
name="branch"
class="form-select"
required>

<option value="">Select Branch</option>

<option>Computer Science</option>

<option>Information Technology</option>

<option>Electronics</option>

<option>Mechanical</option>

<option>Civil</option>

</select>

</div>

<div class="mb-3">

<label class="form-label">CGPA</label>

<input
type="number"
step="0.01"
min="0"
max="10"
name="cgpa"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">Phone</label>

<input
type="text"
name="phone"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">City</label>

<input
type="text"
name="city"
class="form-control"
required>

</div>

<div class="text-center">

<button
type="submit"
class="btn btn-primary">

Register Student

</button>

<a
href="students.php"
class="btn btn-success">

View Students

</a>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>