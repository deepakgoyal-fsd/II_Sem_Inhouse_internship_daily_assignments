<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f2f2f2;
}
.container{
    max-width:700px;
    margin-top:40px;
}
.card{
    border-radius:15px;
}
</style>

</head>
<body>

<div class="container">

<div class="card shadow">

<div class="card-header bg-primary text-white text-center">
<h2>Student Registration Form</h2>
</div>

<div class="card-body">

<form action="process.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Phone Number</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Password</label>
<input type="password" name="password" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Confirm Password</label>
<input type="password" name="confirm_password" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Gender</label><br>

<input type="radio" name="gender" value="Male"> Male

<input type="radio" name="gender" value="Female"> Female

<input type="radio" name="gender" value="Other"> Other

</div>

<div class="mb-3">
<label class="form-label">Course</label>

<select name="course" class="form-select" required>

<option value="">Select Course</option>

<option>BCA</option>

<option>B.Tech</option>

<option>BBA</option>

<option>MCA</option>

<option>MBA</option>

</select>

</div>

<div class="mb-3">
<label class="form-label">Address</label>

<textarea name="address" class="form-control" rows="4" required></textarea>

</div>

<div class="mb-3">
<label class="form-label">Profile Photo</label>

<input type="file" name="photo" class="form-control">

</div>

<div class="text-center">

<button type="submit" class="btn btn-success px-5">
Register
</button>

</div>

</form>

</div>

</div>

</div>

</body>
</html>