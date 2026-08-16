<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "industrialtraining";
$conn = mysqli_connect($host, $user, $password,
$database);

if (!$conn) {
die("Connection Failed:".
mysqli_connect_error());
}

echo "Connection Successful! <br>";

?>