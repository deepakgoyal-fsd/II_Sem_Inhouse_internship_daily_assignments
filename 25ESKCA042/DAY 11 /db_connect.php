<?php

$host = "localhost";
$user = "root";
$password = "1234567";
$database = "skit_stu";

$conn = mysqli_connect($host, $user, $password, $database);

if(!$conn){
    die("Connection Failed : " . mysqli_connect_error());
}

?>
