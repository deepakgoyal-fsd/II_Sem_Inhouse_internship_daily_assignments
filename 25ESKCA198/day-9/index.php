<!DOCTYPE html>
<html>
<head>

<title>Registration Form</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center">

<div class="col-md-5">

<div class="card mt-5">

<div class="card-header text-center bg-primary text-white">

<h3>Student Registration</h3>

</div>

<div class="card-body">

<form action="register.php" method="POST">

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
class="form-select">

<option>CSE</option>

<option>IT</option>

<option>Civil</option>

<option>Mechanical</option>

<option>Electrical</option>

</select>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button
class="btn btn-success w-100"
name="register">

Register

</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>