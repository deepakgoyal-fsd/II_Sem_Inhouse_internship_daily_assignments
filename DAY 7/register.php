<!DOCTYPE html>
<html>

<head>

<title>Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card p-4 shadow">

<h2>Student Registration</h2>

<form action="process.php" method="POST">

<label>Name</label>

<input type="text" name="name" class="form-control">

<br>

<label>Email</label>

<input type="email" name="email" class="form-control">

<br>

<label>Branch</label>

<input type="text" name="branch" class="form-control">

<br>

<label>Phone</label>

<input type="text" name="phone" class="form-control">

<br>

<button class="btn btn-primary">

Submit

</button>

</form>

</div>

</div>

</body>

</html>