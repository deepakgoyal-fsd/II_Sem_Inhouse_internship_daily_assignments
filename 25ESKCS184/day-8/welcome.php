<!DOCTYPE html>
<html>
<head>

<title>Welcome Card</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card p-4 shadow">

<h2>Student Details</h2>

<form action="welcome_result.php"

method="POST">

<label>Name</label>

<input type="text"

name="name"

class="form-control">

<br>

<label>Branch</label>

<input type="text"

name="branch"

class="form-control">

<br>

<label>College</label>

<input type="text"

name="college"

class="form-control">

<br>

<button class="btn btn-success">

Generate Card

</button>

</form>

</div>

</div>

</body>

</html>