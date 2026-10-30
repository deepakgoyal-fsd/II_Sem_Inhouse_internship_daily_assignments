<?php
include 'db.php';
$id=(int)$_POST['id'];
$name=mysqli_real_escape_string($conn,$_POST['name']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$branch=mysqli_real_escape_string($conn,$_POST['branch']);
$cgpa=$_POST['cgpa'];
mysqli_query($conn,"UPDATE students SET name='$name',email='$email',branch='$branch',cgpa='$cgpa' WHERE id=$id");
header("Location: students.php");
exit;
?>