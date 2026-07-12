<?php

$page="home";

include("header.php");

?>

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card">

<div class="card-header">

<i class="fa-solid fa-user-graduate"></i>

Student Registration Form

</div>

<div class="card-body">

<form action="process.php" method="POST" enctype="multipart/form-data">

<div class="mb-3">

<label>Name</label>

<input
type="text"
name="name"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>CGPA</label>

<input
type="number"
name="cgpa"
step="0.01"
min="0"
max="10"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Branch</label>

<select
name="branch"
class="form-select"
required>

<option value="">Select Branch</option>

<option>CSE</option>

<option>ECE</option>

<option>ME</option>

<option>CE</option>

<option>EE</option>

</select>

</div>

<div class="mb-3">

<label>College</label>

<input
type="text"
name="college"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Gender</label>

<br>

<input
type="radio"
name="gender"
value="Male"
required>

Male

<input
type="radio"
name="gender"
value="Female">

Female

</div>

<div class="mb-3">

<label>Course</label>

<select
name="course"
class="form-select"
required>

<option value="">Select Course</option>

<option>B.Tech</option>

<option>BCA</option>

<option>B.Sc</option>

<option>MCA</option>

</select>

</div>

<div class="mb-3">

<label>Address</label>

<textarea
name="address"
class="form-control"
rows="3"
required></textarea>

</div>

<div class="mb-3">

<label>Profile Photo</label>

<input
type="file"
name="photo"
class="form-control">

<small class="text-muted">

(UI only — upload not required)

</small>

</div>

<button
type="submit"
class="btn btn-primary">

<i class="fa-solid fa-paper-plane"></i>

Submit

</button>

<button
type="reset"
class="btn btn-secondary">

Reset

</button>

</form>

</div>

</div>

</div>

</div>

<?php

include("footer.php");

?>