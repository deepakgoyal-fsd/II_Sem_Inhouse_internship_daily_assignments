<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="text-center mb-4">Student Registration</h2>

<form action="register.php" method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label>Mobile</label>
<input type="text" name="mobile" class="form-control">
</div>

<div class="mb-3">
<label>Profile Photo</label>
<input type="file" class="form-control">
</div>

<div class="mb-3">
<label>Gender</label><br>

<input type="radio" name="gender" value="Male"> Male

<input type="radio" name="gender" value="Female"> Female

<input type="radio" name="gender" value="Other"> Other

</div>

<div class="mb-3">
<label>Course</label>

<select name="course" class="form-select">
<option value="">Select Course</option>
<option>B.Tech</option>
<option>BCA</option>
<option>B.Sc</option>
<option>MCA</option>
</select>

</div>

<div class="mb-3">
<label>Address</label>

<textarea name="address" rows="3" class="form-control"></textarea>

</div>

<button class="btn btn-primary w-100">Register</button>

</form>

</div>

</div>

</body>
</html>