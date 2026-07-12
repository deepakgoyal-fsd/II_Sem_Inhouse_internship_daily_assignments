<?php
include "db_connect1.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$photo = $_POST['photo'];
$address = $_POST['address'];
$course = $_POST['course'];

$sql = "INSERT INTO students(name,email,phone,photo,address,course)
VALUES('$name','$email','$phone','$photo','$address','$course')";

if(mysqli_query($conn,$sql))
{
    echo "Record Inserted Successfully";
}
else
{
    echo "Error";
}
?>
