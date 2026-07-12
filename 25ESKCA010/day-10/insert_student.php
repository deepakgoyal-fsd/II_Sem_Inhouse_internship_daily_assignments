<?php

include("db_connect.php");

$name=$_POST["name"];
$email=$_POST["email"];
$branch=$_POST["branch"];
$cgpa=$_POST["cgpa"];

$sql="INSERT INTO students(name,email,branch,cgpa)
VALUES('$name','$email','$branch','$cgpa')";

if(mysqli_query($conn,$sql)){

header("Location:index.php");

}

else{

echo "Error";

}

?>