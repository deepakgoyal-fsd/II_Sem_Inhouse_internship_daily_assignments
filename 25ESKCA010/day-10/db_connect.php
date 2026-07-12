<?php

$host="localhost";
$user="root";
$password="";
$database="student_crud";

$conn=mysqli_connect($host,$user,$password,$database);

if(!$conn){
    die("Connection Failed");
}

?>