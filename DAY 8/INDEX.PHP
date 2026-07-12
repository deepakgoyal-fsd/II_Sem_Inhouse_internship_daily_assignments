<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white text-center">
<h2>Student Registration Form</h2>
</div>

<div class="card-body">

<form action="process.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control">
</div>

<div class="mb-3">
<label>Password</label>
<input type="password" name="password" class="form-control">
</div>

<div class="mb-3">
<label>Confirm Password</label>
<input type="password" name="confirm_password" class="form-control">
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

<option>BCA</option>

<option>B.Tech</option>

<option>BBA</option>

<option>MCA</option>

<option>MBA</option>

</select>

</div>

<div class="mb-3">

<label>Address</label>

<textarea name="address" rows="4" class="form-control"></textarea>

</div>

<div class="mb-3">

<label>Profile Photo</label>

<input type="file" name="photo" class="form-control">

</div>

<div class="text-center">

<button class="btn btn-success" type="submit">
Register
</button>

</div>

</form>

</div>

</div>

</div>

</body>
</html>