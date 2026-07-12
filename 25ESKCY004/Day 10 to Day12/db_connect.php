<?php

$host = "localhost";
$users = "root";
$password = "Aditya@123";
$database = "industrial_training";

$conn = mysqli_connect($host,$users,$password,$database);
if(!$conn){
   die("connection failed:" .mysqli_connect_error()); 
}

echo "Connection Succesfully";

?>