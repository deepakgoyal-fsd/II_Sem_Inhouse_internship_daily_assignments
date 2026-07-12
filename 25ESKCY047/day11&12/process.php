<?php

include("db_connect.php");

$name = $_POST['name'];
$email = $_POST['email'];
$college = $_POST['college'];
$branch = $_POST['branch'];


$sql = "INSERT INTO students(name,email,college,branch)
VALUES('$name','$email','$college','$branch')";

if(mysqli_query($conn,$sql))
{
    echo "<script>
    alert('Student Added Successfully!');
    window.location='students.php';
    </script>";
}
else
{
    echo "Error : " . mysqli_error($conn);
}

?>