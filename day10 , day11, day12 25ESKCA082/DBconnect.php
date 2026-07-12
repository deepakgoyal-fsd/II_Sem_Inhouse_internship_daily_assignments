<?php
$host="localhost";
$user="root";
$password="geetanjali@12";
$database="industrial_training";

$conn=mysqli_connect($host,$user,$password,$database);

if(!$conn){
    die("connection failed:".mysqli_connect_error());
}
else{
    echo"connection successful";
}
?>