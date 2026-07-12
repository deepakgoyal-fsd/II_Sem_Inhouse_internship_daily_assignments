<?php

include "header.php";

include "db.php";


$id=$_GET['id'];


$result=mysqli_query($conn,"SELECT * FROM students WHERE id=$id");


$row=mysqli_fetch_assoc($result);


?>



<div class="card p-5">


<h1 class="text-center">

✏️ Edit Student

</h1>



<form action="update.php" method="POST">


<input type="hidden" name="id" value="<?php echo $row['id']; ?>">


<label>Name</label>

<input 
class="form-control mb-3"
type="text"
name="name"
value="<?php echo $row['name']; ?>">



<label>Email</label>

<input 
class="form-control mb-3"
type="email"
name="email"
value="<?php echo $row['email']; ?>">



<label>Branch</label>

<input 
class="form-control mb-3"
type="text"
name="branch"
value="<?php echo $row['branch']; ?>">



<label>Course</label>

<input 
class="form-control mb-3"
type="text"
name="course"
value="<?php echo $row['course']; ?>">



<label>CGPA</label>

<input 
class="form-control mb-3"
type="text"
name="cgpa"
value="<?php echo $row['cgpa']; ?>">



<label>Status</label>

<select 
class="form-control mb-3"
name="status">


<option>

Active

</option>


<option>

Inactive

</option>


</select>



<button class="btn btn-success">

Update Student

</button>


</form>


</div>




<?php

include "footer.php";

?>