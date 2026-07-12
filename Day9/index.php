<?php
include 'db.php';

if(isset($_POST['save'])){

$name=$_POST['name'];
$email=$_POST['email'];
$course=$_POST['course'];
$phone=$_POST['phone'];

if (!mysqli_query($conn,"INSERT INTO system (name,email,course,phone)
VALUES('$name','$email','$course','$phone')"));
{
    die(mysqli_error($conn));
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Student Management System</title>

<link rel="stylesheet" href="style.css">

<script src="script.js"></script>

</head>

<body>

<div class="container">

<h2>Student Management System</h2>

<form method="POST" name="studentForm" onsubmit="return validateForm()">

<input type="text" name="name" placeholder="Name">

<input type="email" name="email" placeholder="Email">

<input type="text" name="course" placeholder="Course">

<input type="text" name="phone" placeholder="Phone">

<button name="save">Add Student</button>

</form>

<table>

<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Course</th>

<th>Phone</th>

<th>Action</th>

</tr>

<?php

$result=mysqli_query($conn,"SELECT * FROM system");

echo mysqli_num_rows($result);
exit;

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td><?php echo $row['id'];?></td>

<td><?php echo $row['name'];?></td>

<td><?php echo $row['email'];?></td>

<td><?php echo $row['course'];?></td>

<td><?php echo $row['phone'];?></td>

<td>

<a href="edit.php?id=<?php echo $row['id'];?>">Edit</a> |

<a href="delete.php?id=<?php echo $row['id'];?>">Delete</a>

</td>

</tr>

<?php
}
?>

</table>

</div>

</body>

</html>