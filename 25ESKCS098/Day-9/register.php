<!DOCTYPE html>

<html>

<head>

<title>Student Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card">

<div class="card-header text-center">

<h2>Student Registration Form</h2>

</div>

<div class="card-body">

<form action="process.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Branch</label>

<select
name="branch"
class="form-select"
required>

<option value="">Select Branch</option>

<option>CSE</option>

<option>ECE</option>

<option>ME</option>

<option>CE</option>

<option>EE</option>

</select>

</div>

<div class="mb-3">

<label>CGPA</label>

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

<label>Phone</label>

<input
type="text"
name="phone"
class="form-control"
required>

</div>

<div class="mb-3">

<label>City</label>

<input
type="text"
name="city"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Course</label>

<input
type="text"
name="course"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control"
rows="3"
required></textarea>

</div>

<div class="mb-3">

<label>Photo</label>

<input
type="file"
name="photo"
class="form-control"
required>

</div>

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

</form>

</div>

</div>

</div>

</div>

</div>

</body>

</html>