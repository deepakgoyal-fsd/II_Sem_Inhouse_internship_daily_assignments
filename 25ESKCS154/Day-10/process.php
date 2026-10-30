<?php
include 'db.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
$name=mysqli_real_escape_string($conn,$_POST['name']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$branch=mysqli_real_escape_string($conn,$_POST['branch']);
$cgpa=$_POST['cgpa'];
$sql="INSERT INTO students(name,email,branch,cgpa) VALUES('$name','$email','$branch','$cgpa')";
if(mysqli_query($conn,$sql)){
echo "<h2>Student Registered Successfully!</h2><a href='index.php'>Back</a>";
}else{
echo mysqli_error($conn);
}
}
?>