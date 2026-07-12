<?php

include "auth.php";
include "db.php";
include "header.php";


$id=$_GET['id'];


$result=mysqli_query($conn,"SELECT * FROM students WHERE id=$id");


$row=mysqli_fetch_assoc($result);


?>


<div class="card p-5">


<h2>Edit Student</h2>



<form action="update.php" method="POST">


<input type="hidden" name="id" value="<?php echo $row['id']; ?>">



<label>Name</label>

<input class="form-control mb-3"
name="name"
value="<?php echo $row['name']; ?>">



<label>Email</label>

<input class="form-control mb-3"
name="email"
value="<?php echo $row['email']; ?>">



<label>Branch</label>

<input class="form-control mb-3"
name="branch"
value="<?php echo $row['branch']; ?>">



<label>Course</label>

<input class="form-control mb-3"
name="course"
value="<?php echo $row['course']; ?>">



<label>CGPA</label>

<input class="form-control mb-3"
name="cgpa"
value="<?php echo $row['cgpa']; ?>">



<label>Status</label>


<select name="status" class="form-control mb-3">

<option>Active</option>

<option>Inactive</option>

</select>



<button class="btn btn-success">

Update

</button>


</form>


</div>


<?php

include "footer.php";

?>