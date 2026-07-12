<?php
$servername = "localhost";
$username = "root";
$password = "1234567";
$dbname = "stu_manage";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>