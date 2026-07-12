<?php include 'header.php'; ?>

<div class="card p-4">

<h2 class="text-center mb-4">
Student Registration Form
</h2>

<form action="confirm.php" method="POST">

<div class="row">

<div class="col-md-6 mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>CGPA</label>
<input type="number" step="0.1" name="cgpa" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Branch</label>
<input type="text" name="branch" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>College</label>
<input type="text" name="college" class="form-control">
</div>

<div class="col-md-6 mb-3">
<label>Course</label>

<select class="form-select" name="course">

<option>B.Tech</option>
<option>BCA</option>
<option>MCA</option>
<option>BBA</option>

</select>

</div>

<div class="col-md-6">

<label>Gender</label>

<div>

<input type="radio" name="gender" value="Male"> Male

<input type="radio" name="gender" value="Female"> Female

</div>

</div>

<div class="col-md-6">

<label>Student Photo</label>

<input type="file" class="form-control">

</div>

<div class="col-12 mt-3">

<label>Address</label>

<textarea class="form-control" rows="3" name="address"></textarea>

</div>

</div>

<div class="text-center mt-4">

<button class="btn btn-primary btn-lg">

<i class="fa-solid fa-paper-plane"></i>

Submit Registration

</button>

</div>

</form>

</div>

<?php include 'footer.php'; ?>