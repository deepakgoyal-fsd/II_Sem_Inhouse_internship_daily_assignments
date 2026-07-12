<?php
$host="localhost";
$user="root";
$password="12345";
$database="industrial_training";
$conn=mysqli_connect($host,$user,$password,$database);
if(!$conn){
    die("connection failed:".mysqli_connect_error());

}
echo"connection successful"; 

?>