<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "skit";

$conn = mysqli_connect($host, $username, $password, $database);

if(!$conn){
die("connection failed: ". mysqli_connect_error());
}


?>