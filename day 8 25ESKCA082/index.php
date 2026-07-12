<?php include 'header.php'; ?>

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card p-4">

<h2 class="text-center mb-4">

<i class="fa-solid fa-user-plus"></i>

Student Registration Form

</h2>

<form action="process.php" method="POST">

<div class="row">

<div class="col-md-6 mb-3">

<label>Name</label>

<input type="text" name="name" class="form-control" required>

</div>

<div class="col-md-6 mb-3">

<label>Email</label>

<input type="email" name="email" class="form-control" required>

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>College</label>

<input type="text" name="college" class="form-control" required>

</div>

<div class="col-md-6 mb-3">

<label>Branch</label>

<select name="branch" class="form-select">

<option>CSE</option>

<option>IT</option>

<option>ECE</option>

<option>ME</option>

<option>CE</option>

</select>

</div>

</div>

<div class="row">

<div class="col-md-6 mb-3">

<label>CGPA</label>

<input type="number"

step="0.01"

name="cgpa"

class="form-control"

required>

</div>

<div class="col-md-6 mb-3">

<label>Phone</label>

<input type="text"

name="phone"

class="form-control"

required>

</div>

</div>

<div class="mb-3">

<label>Address</label>

<textarea class="form-control"

name="address"

rows="3"></textarea>

</div>

<button class="btn btn-primary w-100">

Submit Registration

</button>

</form>

</div>

</div>

</div>

<?php include 'footer.php'; ?>