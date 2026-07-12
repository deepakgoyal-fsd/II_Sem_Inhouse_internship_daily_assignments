<?php

include("db_connect.php");

$id = $_GET['id'];

$get = "SELECT name FROM students WHERE id=$id";
$result = mysqli_query($conn,$get);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];


$delete = "DELETE FROM students WHERE id=$id";

if(mysqli_query($conn,$delete))
{
    header("Location: students.php?msg=deleted&name=".$name);
    exit();
}
else
{
    echo "Delete Failed : ".mysqli_error($conn);
}

?>