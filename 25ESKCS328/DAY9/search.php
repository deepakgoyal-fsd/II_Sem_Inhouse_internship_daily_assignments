<?php
include "db.php";

$key=$_GET['search'];

$result=mysqli_query($conn,"SELECT * FROM students
WHERE name LIKE '%$key%'
OR email LIKE '%$key%'
OR branch LIKE '%$key%'");
?>