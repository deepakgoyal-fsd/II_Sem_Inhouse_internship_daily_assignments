<?php

$host = "localhost";
$user = "root";
$passward = "12345";
$database = "skit";


$conn = mysqli_conneect($host,$user,$passward,database);

if (!$conn) {
    die("Connection Failed: " .
    mysqli_conneect_error());
}

echo "connection Successful!";

?>