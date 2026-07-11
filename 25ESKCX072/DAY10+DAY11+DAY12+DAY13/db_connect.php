<?php
$servername = "localhost";
$user = "root";
$password = "niyatisharma";
$database = "industrial_training";
$conn = mysqli_connect($servername,$user,$password,$database);

if(!$conn){
    die("Connection Failed:" .
    mysqli_connect_error());
}
echo "Connection Successfull";
?>
