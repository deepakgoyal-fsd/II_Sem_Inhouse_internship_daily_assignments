<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Student Registration Portal</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
body{
    background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
    min-height:100vh;
}

.navbar{
    box-shadow:0 3px 10px rgba(0,0,0,.3);
}

.card{
    border:none;
    border-radius:15px;
}

.card-header{
    border-radius:15px 15px 0 0!important;
}

.btn{
    width:100%;
}

h2{
    font-weight:bold;
}
</style>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container">
<a class="navbar-brand fw-bold" href="#">
🎓 Student Registration Portal
</a>

<a href="DAY8display.php" class="btn btn-warning text-dark ms-auto">
View Students
</a>

</div>
</nav>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-7">

<div class="card shadow-lg">

<div class="card-header bg-primary text-white text-center">
<h2>Student Registration Form</h2>
</div>

<div class="card-body">

<form action="DAY8save.php" method="POST">

<div class="mb-3">
<label class="form-label">Full Name</label>
<input
type="text"
name="fullname"
class="form-control"
placeholder="Enter Full Name"
required>
</div>

<div class="mb-3">
<label class="form-label">Email Address</label>
<input
type="email"
name="email"
class="form-control"
placeholder="Enter Email"
required>
</div>

<div class="mb-3">
<label class="form-label">Phone Number</label>
<input
type="text"
name="phone"
class="form-control"
maxlength="10"
placeholder="Enter Phone Number"
required>
</div>

<div class="mb-3">
<label class="form-label">Course</label>

<select name="course" class="form-select" required>

<option value="">Select Course</option>

<option>B.Tech CSE</option>

<option>B.Tech AI</option>

<option>B.Tech IT</option>

<option>BCA</option>

<option>MCA</option>

<option>MBA</option>

</select>

</div>

<div class="mb-3">
<label class="form-label">CGPA</label>

<input
type="number"
name="cgpa"
class="form-control"
step="0.01"
min="0"
max="10"
placeholder="Enter CGPA"
required>

</div>

<button
type="submit"
class="btn btn-success btn-lg">
Register Student
</button>

</form>

</div>

</div>

</div>

</div>

</div>

</body>
</html>