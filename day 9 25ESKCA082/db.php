<?php

$conn = mysqli_connect("localhost", "root", "Rohit@45", "my");



if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

echo "✓ Database connection successful!";

?>











