<?php

$host = "localhost";
$user = "root";
$password = "Kahkashi@4162";
$database = "student";

$conn = mysqli_connect($host, $user, $password, $database);
if(!$conn){
    die("connection failed:".
     mysqli_connect_error());

}
echo "connection successful!";
?>
