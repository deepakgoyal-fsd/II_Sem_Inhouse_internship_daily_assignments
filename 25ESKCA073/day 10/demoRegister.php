<?php
$host = "localhost";
$user = "root";
$password = "@Divisha2006";
$database = "SKIT";
$conn = mysqli_connect($host, $user, $password,
$database);
if (!$conn) {
die("Connection Failed: " . mysqli_connect_error());
}


include('demo.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$branch = mysqli_real_escape_string($conn, $_POST['branch']);
$cgpa = $_POST['cgpa'];
$sql = "INSERT INTO students (name, branch, cgpa)
VALUES ('$name', '$email', '$branch', '$cgpa')";

if (mysqli_query($conn, $sql)) {
echo "Student Registered Successfully!";
} else {
echo "Error: " . mysqli_error($conn);
}
}


echo "Connection Successful!";

?>
