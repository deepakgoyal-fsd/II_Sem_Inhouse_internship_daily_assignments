<?php

$host="localhost";
$user="root";
$password="Bhavya123";
$dbname="skit";

$conn = mysqli_connect($host,$user,$password,$dbname);

if(!$conn){
    die("Connection Failed : ".mysqli_connect_error());
}
echo "connection successful<br>";
?>