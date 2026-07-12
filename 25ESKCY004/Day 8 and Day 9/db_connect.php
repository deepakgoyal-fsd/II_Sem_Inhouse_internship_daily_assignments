<?php

$host = "localhost";
$user = "root";
$password = "Aditya@123";
$database = "skit";

$conn = mysqli_connect($host,$user,$password,$database);
if(!$conn){
   die("connection failed:" .mysqli_connect_error()); 
}

echo "Connection Succesfully";

?>