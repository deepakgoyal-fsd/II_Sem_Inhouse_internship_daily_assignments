<?php
include("db_connect.php");

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "DELETE FROM students WHERE id='$id'";

    if(mysqli_query($conn, $sql))
    {
        header("Location: students.php");
        exit();
    }
    else
    {
        echo "Error : ".mysqli_error($conn);
    }
}
?>