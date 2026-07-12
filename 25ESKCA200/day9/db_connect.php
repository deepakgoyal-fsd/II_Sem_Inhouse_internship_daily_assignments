<?php

$host="localhost";
$user="root";
$password="MyNewPass123";
$database="skit";
$conn = mysqli_connect($host, $user, $password, $database);
if(!$conn){
    die("Connection failed:");
    mysqli_connect_error();
}
?>