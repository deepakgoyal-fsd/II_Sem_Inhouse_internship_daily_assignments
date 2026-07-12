<?php
include "db.php";
$id=$_POST['id'];
$name=$_POST['fullname'];
$email=$_POST['email'];
$age=$_POST['age'];
$course=$_POST['course'];
$sql="UPDATE students SET fullname='$name', email='$email', age='$age', course='$course' WHERE id='$id'";
mysqli_query($conn,$sql);
header("Location: display.php");
?>