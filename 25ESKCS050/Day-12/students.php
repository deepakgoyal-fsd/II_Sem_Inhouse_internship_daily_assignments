<?php

include "auth.php";
include "db.php";
include "header.php";


$search = "";

if(isset($_GET['search'])){

    $search = $_GET['search'];

    $query = "SELECT * FROM students 
    WHERE name LIKE '%$search%' 
    OR email LIKE '%$search%'
    OR branch LIKE '%$search%'
    OR course LIKE '%$search%'";

}
else{

    $query = "SELECT * FROM students";

}


$result = mysqli_query($conn,$query);

$count = mysqli_num_rows($result);

?>


<div class="container mt-5">


<h1 class="text-center mb-4">
📋 Student Records
</h1>



<form method="GET">


<input 
type="text"
name="search"
class="form-control mb-3"
placeholder="Search by name, email, branch or course">


<button class="btn btn-primary mb-3">

Search

</button>


</form>



<h4>

Total Students : 

<span class="badge bg-success">

<?php echo $count; ?>

</span>

</h4>



<table class="table table-bordered mt-4">


<tr class="table-dark">


<th>ID</th>

<th>Photo</th>

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

<img 
src="uploads/<?php echo $row['photo']; ?>"
width="60"
height="60"
class="rounded-circle">

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
onclick="return confirm('Delete this student?')"
href="delete.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm">

Delete

</a>


</td>


</tr>



<?php

}

?>


</table>


</div>



<?php

include "footer.php";

?>