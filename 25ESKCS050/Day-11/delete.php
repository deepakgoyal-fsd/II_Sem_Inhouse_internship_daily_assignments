<?php

include "db.php";


$id=$_GET['id'];


$sql="DELETE FROM students WHERE id=$id";


if(mysqli_query($conn,$sql)){


    header("Location: students.php");


}

else{


    echo "Delete Failed";


}


?>