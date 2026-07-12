<?php include("header.php"); ?>

<div class="card shadow p-4">

<h2 class="text-center text-primary">
Student Registration Form
</h2>

<form action="process.php" method="POST">

<div class="mb-3">
<label>Name</label>
<input type="text" name="name" class="form-control">
</div>

<div class="mb-3">
<label>Email</label>
<input type="email" name="email" class="form-control">
</div>

<div class="mb-3">
<label>CGPA</label>
<input type="number" step="0.01" name="cgpa" class="form-control">
</div>

<div class="mb-3">
<label>Branch</label>

<select name="branch" class="form-select">
<option>CSE</option>
<option>AI</option>
<option>IT</option>
<option>ECE</option>
</select>

</div>

<div class="mb-3">
<label>College</label>

<input type="text" name="college" class="form-control">

</div>

<button class="btn btn-success w-100">
Submit
</button>

</form>

</div>

<?php include("footer.php"); ?>