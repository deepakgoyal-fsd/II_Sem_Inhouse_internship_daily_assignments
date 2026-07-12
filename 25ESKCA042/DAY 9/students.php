<?php
include "db_connect1.php";

$result = mysqli_query($conn,"SELECT * FROM students");
?>

<table class="table table-bordered table-striped">

<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Photo</th>
<th>Address</th>
<th>Course</th>
<th>Date Registered</th>
</tr>

<?php
while($row=mysqli_fetch_assoc($result))
{
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['photo']; ?></td>
<td><?php echo $row['address']; ?></td>
<td><?php echo $row['course']; ?></td>
<td><?php echo $row['date_registered']; ?></td>
</tr>

<?php
}
?>

</table>
