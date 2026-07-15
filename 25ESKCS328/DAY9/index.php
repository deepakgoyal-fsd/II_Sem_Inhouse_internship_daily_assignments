<?php
include "db.php";
$result = mysqli_query($conn,"SELECT * FROM students");
?>

<table border="1">
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Branch</th>
<th>Action</th>
</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['branch']; ?></td>
<td>
<a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>
</tr>
<?php } ?>
</table>