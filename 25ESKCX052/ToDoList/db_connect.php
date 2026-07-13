<?php
$servername = "localhost";
$username = "root";
$password = "1234567";
$dbname = "todo_list";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
