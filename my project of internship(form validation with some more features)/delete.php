<?php

include("db_connect.php");

// Student ID
$id = $_GET['id'];

// Student Name (Success Message ke liye)
$get = "SELECT full_name FROM user WHERE id=$id";
$result = mysqli_query($conn,$get);
$row = mysqli_fetch_assoc($result);

$name = $row['full_name'];

// Delete Query
$delete = "DELETE FROM user WHERE id=$id";

if(mysqli_query($conn,$delete))
{
    header("Location: user.php?msg=deleted&name=".$name);
    exit();
}
else
{
    echo "Delete Failed : ".mysqli_error($conn);
}

?>