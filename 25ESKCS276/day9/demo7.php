<?php
include 'db_connect.php';

$email = $_POST['email'] ?? '';
$check = "SELECT * FROM students WHERE email='$email'";
$result = mysqli_query($conn, $check);

if (mysqli_num_rows($result) > 0) {
    echo "Email already exists";
}