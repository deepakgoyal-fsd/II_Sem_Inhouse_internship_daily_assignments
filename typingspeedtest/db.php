<?php
$host = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "typing_speed_test";

$conn = mysqli_connect($host, $dbUser, $dbPass, $dbName);

if (!$conn) {
    $conn = false;
}
?>