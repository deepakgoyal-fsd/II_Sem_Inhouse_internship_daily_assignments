<!DOCTYPE html>
<html>
<head>
<title>Student Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
background:#f5f7fa;
}

.container{
margin-top:40px;
max-width:700px;
}

.card{
border-radius:15px;
box-shadow:0 0 20px rgba(0,0,0,.2);
}

</style>

</head>

<body>

<div class="container">

<div class="card">

<div class="card-header bg-primary text-white">

<h3>Student Registration Form</h3>

</div>

<div class="card-body">

<form action="confirm.php" method="post" enctype="multipart/form-data">

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

<label>Gender</label><br>

<input type="radio" name="gender" value="Male"> Male

<input type="radio" name="gender" value="Female"> Female

</div>

<div class="mb-3">

<label>Course</label>

<select name="course" class="form-select">

<option>B.Tech CSE</option>

<option>B.Tech AIML</option>

<option>B.Tech ECE</option>

<option>B.Tech ME</option>

<option>B.Tech Civil</option>

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

</div>

</body>

</html>