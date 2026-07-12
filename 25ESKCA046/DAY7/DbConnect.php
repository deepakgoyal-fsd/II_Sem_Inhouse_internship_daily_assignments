<?php
$host = "localhost";
$user = "root";
$password = "Bhavy@Anime";
$database = "student";

$conn = mysqli_connect($host , $user , $password , $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connection Successful";
?>