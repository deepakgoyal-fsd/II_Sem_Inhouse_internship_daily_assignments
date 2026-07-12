<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration Form</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-light">
<div class="container mt-5">
<div class="card shadow p-4">
<h2 class="text-center mb-4">Student Registration Form</h2>
<form action="process.php" method="POST" enctype="multipart/form-data">

<div class="input-box">
<label class="form-label">Name</label>
<input type="text" class="form-control" name="name">
</div>

<div class="input-box">
<label class="form-label"></label>
<input type="email" class="form-control" name="email">
</div>

<div class="input-box">
<label class="form-label">Branch</label>
<input type="text" class="form-control" name="branch">
</div>

<div class="input-box">
<label class="form-label">Phone Number</label>
<input type="text" class="form-control" name="phone">
</div>

<div class="input-box">
    <label>Profile Photo</label>
    <input type="file" name="photo" class="form-control">
</div>

<div class="input-box">
<label class="form-label">Gender</label><br>

<input type="radio" name="gender" value="Male"> Male


<input type="radio" name="gender" value="Female"> Female


<input type="radio" name="gender" value="Other"> Other

</div>

<div class="input-box">

<label class="form-label">Course</label>

<select class="form-select" name="course">

<option value="">Select Course</option>

<option>B.Tech CSE</option>
<option>B.Tech DS</option>
<option>B.Tech AI</option>
<option>BCA</option>
<option>MCA</option>

</select>

</div>

<div class="input-box">

<label class="form-label">Address</label>

<textarea class="form-control" rows="4" name="address"></textarea>

</div>

<div class="text-center">

<button type="submit" name="submit" class="btn btn-primary">
Register
</button>

</div>
</form>
</div>
</div>
</body>
</html>