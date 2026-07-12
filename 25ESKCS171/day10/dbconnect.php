<?php
$conn = mysqli_connect("localhost" , "root" , "" , "student_management");
if(!$conn){
    echo "connection failed";
}
else{
    echo "connection successful";
}



?>
