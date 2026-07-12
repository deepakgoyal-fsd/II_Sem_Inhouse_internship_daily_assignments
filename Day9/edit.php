<?php

include 'db.php';

$id=$_GET['id'];

$data=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM system WHERE id=$id"));

if(isset($_POST['update'])){

$name=$_POST['name'];
$email=$_POST['email'];
$course=$_POST['course'];
$phone=$_POST['phone'];

mysqli_query($conn,"UPDATE system SET
name='$name',
email='$email',
course='$course',
phone='$phone'
WHERE id=$id");

header("Location:index.php");

}

?>

<!DOCTYPE html>

<html>

<head>

<link rel="stylesheet" href="style.css">

</head>

<body>

<div class="container">

<h2>Edit Student</h2>

<form method="POST">

<input type="text" name="name" value="<?php echo $data['name'];?>">

<input type="email" name="email" value="<?php echo $data['email'];?>">

<input type="text" name="course" value="<?php echo $data['course'];?>">

<input type="text" name="phone" value="<?php echo $data['phone'];?>">

<button name="update">Update</button>

</form>

</div>

</body>

</html>