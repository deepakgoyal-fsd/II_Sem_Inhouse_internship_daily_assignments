<?php

$host = "localhost";
$user = "root";
$password = "1234";
$database = "industrial_training";

$conn = mysqli_connect($host , $user , $password , $database);

if (!$conn) {
    die("Connection Failed: " .
    mysqli_connect_error());
}

echo "Connection Successfull";

?>
