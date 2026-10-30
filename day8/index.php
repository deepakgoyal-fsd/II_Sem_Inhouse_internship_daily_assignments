<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header text-center header">
<h2><i class="fa-solid fa-user-graduate"></i> Student Registration</h2>
</div>

<div class="card-body">

<form action="confirm.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control" required>
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control" required>
</div>

<div class="mb-3">
<label>Phone</label>
<input type="text" name="phone" class="form-control" required>
</div>

<div class="mb-3">
<label>Student Photo</label>
<input type="file" name="photo" class="form-control">
</div>

<div class="mb-3">
<label>Gender</label><br>

<input type="radio" name="gender" value="Male" checked> Male

<input type="radio" name="gender" value="Female"> Female

<input type="radio" name="gender" value="Other"> Other

</div>

<div class="mb-3">
<label>Course</label>

<select name="course" class="form-select">

<option>BCA</option>
<option>B.Tech</option>
<option>BBA</option>
<option>MCA</option>
<option>MBA</option>

</select>

</div>

<div class="mb-3">

<label>Address</label>

<textarea name="address" class="form-control" rows="3"></textarea>

</div>

<button class="btn btn-primary w-100">

<i class="fa-solid fa-paper-plane"></i>

Register

</button>

</form>

</div>

</div>

</div>

</body>
</html>