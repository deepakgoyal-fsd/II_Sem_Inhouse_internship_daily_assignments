<?php
$host     = "localhost";
$user     = "root";
$dbpassword = "Bhavy@Anime";
$database = "industrial_training";

$conn= mysqli_connect($host, $user, $dbpassword, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

//echo "Connection Successful!";
?>
