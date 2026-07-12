<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "form_validation";

$conn = mysqli_connect($servername,$username,$password,$database);

if(!$conn)
{
    die("Connection Failed");
}

?>