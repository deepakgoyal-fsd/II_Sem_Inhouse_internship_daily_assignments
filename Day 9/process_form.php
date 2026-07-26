<?php

include("db_connect.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$name=mysqli_real_escape_string($conn,$_POST["name"]);
$email=mysqli_real_escape_string($conn,$_POST["email"]);
$branch=mysqli_real_escape_string($conn,$_POST["branch"]);
$cgpa=$_POST["cgpa"];
$phone=mysqli_real_escape_string($conn,$_POST["phone"]);
$city=mysqli_real_escape_string($conn,$_POST["city"]);

$sql="INSERT INTO students(name,email,branch,cgpa,phone,city)
VALUES('$name','$email','$branch','$cgpa','$phone','$city')";

if(mysqli_query($conn,$sql)){

echo "<script>
alert('Student Registered Successfully');
window.location='students.php';
</script>";

}
else{

echo "<script>
alert('Error : ".mysqli_error($conn)."');
window.location='index.php';
</script>";

}

}

?>