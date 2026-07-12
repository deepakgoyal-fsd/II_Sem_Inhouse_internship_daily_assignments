<?php

error_reporting(E_ALL);
ini_set('display_errors',1);

include "header.php";

?>


<div class="card p-5">


<h2 class="text-center">

Student Registration

</h2>



<form action="process.php" method="POST">



<label>Name</label>

<input 
name="name"
class="form-control mb-3">



<label>Email</label>

<input 
name="email"
class="form-control mb-3">



<label>Phone</label>

<input
name="phone"
class="form-control mb-3">



<label>Branch</label>

<input
name="branch"
class="form-control mb-3">




<label>College</label>

<input
name="college"
class="form-control mb-3">




<label>CGPA</label>

<input
name="cgpa"
class="form-control mb-3">





<label>Gender</label>

<br>


<input type="radio" name="gender" value="Male">
Male


<input type="radio" name="gender" value="Female">
Female



<br><br>





<label>Course</label>


<select name="course" class="form-select mb-3">

<option value="">
Select Course
</option>

<option>B.Tech</option>

<option>BCA</option>

<option>MCA</option>


</select>






<label>Address</label>


<textarea 
name="address"
class="form-control mb-3">

</textarea>




<label>Profile Photo</label>


<input 
type="file"
class="form-control mb-3">




<button class="btn btn-primary w-100">

Register

</button>


</form>


</div>



<?php

include "footer.php";

?>