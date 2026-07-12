<?php
include("db.php");

$result = mysqli_query($conn, "SELECT * FROM student");


?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h1>Student Management System</h1>

<a href="add_student.php">
<button>Add Student</button>
</a>

<br><br>


<table>

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Branch</th>
    <th>CGPA</th>
    <th>Photo</th>
    <th>Status</th>
    <th>Action</th>
</tr>


<?php

while($row = mysqli_fetch_assoc($result))
{

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
<?php echo $row['cgpa']; ?>
</td>


<td>

<?php

if(!empty($row['photo']))
{
?>

<img src="uploads/<?php echo $row['photo']; ?>" width="60">

<?php
}
else
{
echo "No Photo";
}

?>

</td>


<td>
<?php echo $row['status']; ?>
</td>


<td>

<a href="edit.php?id=<?php echo $row['id']; ?>">
Edit
</a>

|

<a href="delete.php?id=<?php echo $row['id']; ?>"
onclick="return confirm('Delete Student?')">
Delete
</a>

</td>


</tr>


<?php

}

?>


</table>


</body>
</html>