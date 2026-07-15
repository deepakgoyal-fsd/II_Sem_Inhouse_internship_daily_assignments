<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "students_management";
$conn = mysqli_connect($host, $user, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
foreach ($conn->query("SELECT * FROM students") as $row) {
    echo "ID: " . $row['id'] . ", Name: " . $row['name'] . ", Branch: " . $row['branch'] . ", College: " . $row['college'] . ", Email: " . $row['email'] . "<br>";
}
?>