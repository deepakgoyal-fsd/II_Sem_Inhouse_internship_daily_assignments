<?php
$host = "localhost";
$user = "root";
$dbpassword = "Deepanshu@05";
$database = "industrial_training";

$conn = mysqli_connect($host , $user , $dbpassword , $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connection Successful";
?>