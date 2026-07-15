<?php
include "db.php";

$id=$_POST['id'];
$name=$_POST['name'];
$email=$_POST['email'];
$branch=$_POST['branch'];

mysqli_query($conn,"UPDATE students SET
name='$name',
email='$email',
branch='$branch'
WHERE id=$id");

header("Location:index.php");
?>