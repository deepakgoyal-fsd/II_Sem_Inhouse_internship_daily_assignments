<?php

include("db_connect.php");


$id = $_GET['id'];


$sql = "UPDATE contact_us 
        SET status='Read' 
        WHERE id=$id";

if(mysqli_query($conn, $sql))
{
    header("Location: admin_queries.php?msg=read");
    exit();
}
else
{
    echo "Error : " . mysqli_error($conn);
}

?>