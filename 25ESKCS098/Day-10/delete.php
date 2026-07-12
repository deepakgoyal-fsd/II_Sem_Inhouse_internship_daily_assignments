<?php

include("db_connect.php");

$id = $_GET['id'];

/* Get Student Name (Bonus Requirement) */

$result = mysqli_query($conn,"SELECT name FROM students WHERE id='$id'");

$row = mysqli_fetch_assoc($result);

$name = $row['name'];

/* Delete Student */

$sql = "DELETE FROM students WHERE id='$id'";

if(mysqli_query($conn,$sql)){

header("Location: students.php?delete=Record '$name' Deleted Successfully");

}

else{

echo "Delete Failed";

}

?>