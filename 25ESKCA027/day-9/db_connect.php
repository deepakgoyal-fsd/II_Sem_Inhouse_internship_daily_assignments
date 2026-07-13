<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "students_management";

$conn = mysqli_connect($server, $username, $password, $dbname);

if(!$conn)
{
    die("Database Connection Failed: " . mysqli_connect_error());
}

?>