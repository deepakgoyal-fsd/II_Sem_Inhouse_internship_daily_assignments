<?php

include("db.php");

$id = $_GET['id'];

$sql = "DELETE FROM student WHERE id=$id";

if(mysqli_query($conn, $sql))
{
    echo "Student Deleted Successfully";
}
else
{
    echo "Error: " . mysqli_error($conn);
}

?>