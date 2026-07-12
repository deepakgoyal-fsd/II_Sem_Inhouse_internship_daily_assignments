<?php
include("db_connect.php");

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$cgpa = $_POST['cgpa'];
$course = $_POST['course'];
$address = $_POST['address'];

$sql = "UPDATE students SET
name='$name',
email='$email',
phone='$phone',
cgpa='$cgpa',
course='$course',
address='$address'
WHERE id='$id'";

if(mysqli_query($conn,$sql))
{
    header("Location: students.php");
    exit();
}
else
{
    echo "Error : ".mysqli_error($conn);
}
?>