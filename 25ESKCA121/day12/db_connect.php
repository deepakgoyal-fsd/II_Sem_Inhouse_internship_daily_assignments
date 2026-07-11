<?php

$host = "localhost";
$user = "root";
$password = "krinjal@123";
$database = "stud_port";

$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn){
    die("Connection Failed: " . mysqli_connect_error());
}

?>
