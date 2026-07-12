<?php
/*
$name = $_POST['name'] ?? '';
if (empty($name)) {
    echo "Name is required.";
} else {
    echo "Hello, " . htmlspecialchars($name) . "!";
}
*/

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'students_management';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Database Connection Failed " . mysqli_connect_error());
}

echo "Connected Successfully";
?>