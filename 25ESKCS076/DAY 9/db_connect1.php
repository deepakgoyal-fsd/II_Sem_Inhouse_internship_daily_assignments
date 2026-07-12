<?php

$host   = "localhost";
$user   =  "root";
$password  = "1234567" ;
$database  = "student_management" ;

$conn = mysqli_connect($host, $user, $password,$database);

if (!$conn) {
    die ("connection failed:" . mysqli_connect_error());
}
 echo "connection  successfull ";
 
?>
