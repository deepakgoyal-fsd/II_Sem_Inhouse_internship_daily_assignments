<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Student Registration</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container py-5">

<div class="row justify-content-center">

<div class="col-lg-7">

<div class="card shadow-lg p-4">

<h2 class="text-center mb-4">
Student Registration
</h2>

<form action="register.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label class="form-label">Full Name</label>

<input
type="text"
name="name"
class="form-control"
required
>

</div>

<div class="mb-3">

<label class="form-label">Email</label>

<input
type="email"
name="email"
class="form-control"
required
>

</div>

<div class="mb-3">

<label class="form-label">Phone</label>

<input
type="text"
name="phone"
class="form-control"
required
>

</div>

<div class="mb-3">

<label class="form-label d-block">
Gender
</label>

<div class="form-check form-check-inline">

<input
class="form-check-input"
type="radio"
name="gender"
value="Male"
required
>

<label class="form-check-label">
Male
</label>

</div>

<div class="form-check form-check-inline">

<input
class="form-check-input"
type="radio"
name="gender"
value="Female"
>

<label class="form-check-label">
Female
</label>

</div>

</div>

<div class="mb-3">

<label class="form-label">
Course
</label>

<select
name="course"
class="form-select"
required
>

<option value="">
Select Course
</option>

<option>
Computer Science
</option>

<option>
Information Technology
</option>

<option>
Electronics
</option>

<option>
Mechanical
</option>

<option>
Civil
</option>

</select>

</div>

<div class="mb-3">

<label class="form-label">
Address
</label>

<textarea
name="address"
rows="4"
class="form-control"
required
></textarea>

</div>

<div class="mb-3">

<label class="form-label">
Profile Photo
</label>

<input
type="file"
name="photo"
class="form-control"
accept="image/*"
>

</div>

<div class="d-grid">

<button
type="submit"
class="btn btn-primary btn-lg"
>
Register Student
</button>

</div>

</form>

</div>

</div>

</div>

</div>

</body>
</html>