<!DOCTYPE html>

<html>

<head>

<title>Student Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card">

<div class="card-header">

Student Registration Form

</div>

<div class="card-body">

<form action="process.php" method="POST">

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

<label>Phone Number</label>

<input
type="text"
name="phone"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Gender</label>

<br>

<input
type="radio"
name="gender"
value="Male"
required>

Male

<input
type="radio"
name="gender"
value="Female">

Female

</div>

<div class="mb-3">

<label>Course</label>

<select
name="course"
class="form-select"
required>

<option value="">Select Course</option>

<option>B.Tech</option>

<option>BCA</option>

<option>B.Sc</option>

<option>MCA</option>

</select>

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

<label>Profile Photo</label>

<input
type="file"
name="photo"
class="form-control">

<small class="text-muted">

(UI Only)

</small>

</div>

<button
type="submit"
class="btn btn-primary">

Register

</button>

<button
type="reset"
class="btn btn-secondary">

Reset

</button>

</form>

</div>

</div>

</div>

</div>

</div>

<footer>

Student Registration System - Day 7

</footer>

</body>

</html>
