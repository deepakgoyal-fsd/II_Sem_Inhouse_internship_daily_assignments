<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="text-center text-primary mb-4">
Student Registration
</h2>

<form action="checkregister.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
<label>Gender</label><br>

<input type="radio" name="gender" value="Male"> Male

<input type="radio" name="gender" value="Female"> Female

</div>

<div class="mb-3">
<label>Course</label>

<select name="course" class="form-select">

<option>BCA</option>

<option>B.Tech</option>

<option>BBA</option>

<option>MCA</option>

</select>

</div>

<div class="mb-3">

<label>Address</label>

<textarea name="address" class="form-control"></textarea>

</div>

<div class="mb-3">

<label>Profile Photo</label>

<input type="file" name="photo" class="form-control">

</div>

<button class="btn btn-success w-100">
Register
</button>

</form>

</div>

</div>

</body>
</html>