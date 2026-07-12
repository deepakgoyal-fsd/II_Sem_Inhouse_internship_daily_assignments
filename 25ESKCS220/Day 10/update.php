<?php

include("db.php");

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$branch = $_POST['branch'];
$cgpa = $_POST['cgpa'];
$status = $_POST['status'];


$sql = "UPDATE student SET
name='$name',
email='$email',
branch='$branch',
cgpa='$cgpa',
status='$status'
WHERE id=$id";


if(mysqli_query($conn,$sql))
{
    echo "Student Updated Successfully";
}
else
{
    echo "Error";
}

?>