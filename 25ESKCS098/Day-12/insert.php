<?php

session_start();

if(!isset($_SESSION['username'])){

header("Location: login.php");

}

include("db_connect.php");

$name=$_POST['name'];

$email=$_POST['email'];

$branch=$_POST['branch'];

$phone=$_POST['phone'];

$photo=$_FILES['photo']['name'];

move_uploaded_file($_FILES['photo']['tmp_name'],"uploads/".$photo);

$sql="INSERT INTO students(name,email,branch,phone,photo)

VALUES('$name','$email','$branch','$phone','$photo')";

mysqli_query($conn,$sql);

header("Location: students.php");

?>