<?php

include("db_connect.php");

// Success message after Insert/Update
if(isset($_GET['success']))
{
    echo "<div class='success'>Student record saved successfully.</div>";
}

// Delete message
if(isset($_GET['delete']))
{
    echo "<div class='danger'>Student record deleted successfully.</div>";
}

$result=mysqli_query($conn,"SELECT * FROM students");

// Total students
$count=mysqli_num_rows($result);

?>

<!DOCTYPE html>

<html>

<head>

<title>Student Management System</title>

<link rel="stylesheet" href="style.css">

</head>

<body>

<h2>Student Management System</h2>

<h3>Total Students : <?php echo $count; ?></h3>

<?php

if($count==0)
{
    echo "<p>No student records found.</p>";
}

else
{

?>

<table>

<tr>

<th>ID</th>

<th>Name</th>

<th>Branch</th>

<th>Action</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['branch']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['id']; ?>">✏ Edit</a>

|

<a href="delete.php?id=<?php echo $row['id']; ?>">🗑 Delete</a>

</td>

</tr>

<?php

}

?>

</table>

<?php

}

?>

</body>

</html>
