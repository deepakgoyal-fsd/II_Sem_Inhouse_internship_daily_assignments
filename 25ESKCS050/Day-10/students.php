<?php

include "header.php";

include "db.php";


$search="";


if(isset($_GET['search'])){

$search=$_GET['search'];

$sql="SELECT * FROM students 
WHERE name LIKE '%$search%'
OR email LIKE '%$search%'
OR branch LIKE '%$search%'";

}

else{

$sql="SELECT * FROM students";

}



$result=mysqli_query($conn,$sql);


$count=mysqli_num_rows($result);

?>



<h1 class="text-center mb-4">

📋 Student Records

</h1>




<form method="GET" class="mb-3">


<input 
type="text" 
name="search" 
class="form-control"
placeholder="Search student by name, email or branch"
value="<?php echo $search; ?>"
>


<button class="btn btn-primary mt-2">

Search

</button>


</form>




<h4>

Total Students:

<span class="badge bg-success">

<?php echo $count; ?>

</span>

</h4>





<table class="table table-bordered table-hover mt-4">


<tr class="table-dark">


<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Branch</th>

<th>Course</th>

<th>CGPA</th>

<th>Status</th>

<th>Action</th>


</tr>



<?php

while($row=mysqli_fetch_assoc($result)){

?>


<tr>


<td>

<?php echo $row['id']; ?>

</td>



<td>

<?php echo $row['name']; ?>

</td>



<td>

<?php echo $row['email']; ?>

</td>



<td>

<?php echo $row['branch']; ?>

</td>



<td>

<?php echo $row['course']; ?>

</td>



<td>

<?php echo $row['cgpa']; ?>

</td>



<td>

<span class="badge bg-primary">

<?php echo $row['status']; ?>

</span>

</td>



<td>


<a 
href="edit.php?id=<?php echo $row['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>



<a 
href="delete.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Delete Student?')">

Delete

</a>


</td>


</tr>



<?php

}

?>


</table>



<?php

include "footer.php";

?>