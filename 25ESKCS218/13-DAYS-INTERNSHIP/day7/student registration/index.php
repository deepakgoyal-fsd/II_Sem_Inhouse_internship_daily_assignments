<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Registration System</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background:#f5f7fb;
}

.card{
    border-radius:15px;
}

h2{
    font-weight:bold;
}
</style>

</head>
<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card shadow">

<div class="card-header bg-primary text-white text-center">

<h2>Student Registration System</h2>

</div>

<div class="card-body">

<form action="process.php" method="POST" enctype="multipart/form-data">

<!-- Name -->

<div class="mb-3">
<label class="form-label">Full Name</label>
<input type="text" name="name" class="form-control" placeholder="Enter your name">
</div>

<!-- Email -->

<div class="mb-3">
<label class="form-label">Email</label>
<input type="email" name="email" class="form-control">
</div>

<!-- Phone -->

<div class="mb-3">
<label class="form-label">Phone Number</label>
<input type="text" name="phone" class="form-control">
</div>

<!-- Branch -->

<div class="mb-3">
<label class="form-label">Branch</label>

<select class="form-select" name="branch">

<option value="">Choose Branch</option>

<option>Computer Science</option>

<option>Information Technology</option>

<option>Mechanical</option>

<option>Civil</option>

<option>Electrical</option>

<option>Electronics</option>

</select>

</div>

<!-- Gender -->

<div class="mb-3">

<label class="form-label">Gender</label>

<div>

<input type="radio" name="gender" value="Male"> Male

<input type="radio" name="gender" value="Female" class="ms-3"> Female

<input type="radio" name="gender" value="Other" class="ms-3"> Other

</div>

</div>

<!-- Course -->

<div class="mb-3">

<label class="form-label">Course</label>

<select class="form-select" name="course">

<option value="">Select Course</option>

<option>B.Tech</option>

<option>BCA</option>

<option>B.Sc</option>

<option>MCA</option>

<option>M.Tech</option>

</select>

</div>

<!-- Address -->

<div class="mb-3">

<label class="form-label">Address</label>

<textarea class="form-control" name="address" rows="3"></textarea>

</div>

<!-- Photo -->

<div class="mb-3">

<label class="form-label">Profile Photo</label>

<input type="file" class="form-control" name="photo">

</div>

<div class="d-grid">

<button class="btn btn-success btn-lg">
Register Student
</button>

</div>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>