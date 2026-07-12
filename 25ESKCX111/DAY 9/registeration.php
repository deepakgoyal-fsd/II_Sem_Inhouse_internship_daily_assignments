<?php
// Database connection settings
$servername = "localhost";
$username   = "root";   // default for XAMPP/WAMP
$password   = "";       // default is empty
$dbname     = "registeration.db"; // use the exact database name you created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$name     = $_POST['name'];
$dob      = $_POST['dob'];
$email    = $_POST['email'];
$phone    = $_POST['phone'];
$password = $_POST['password'];
$confirm  = $_POST['confirm'];
$gender   = $_POST['gender'];
$year     = $_POST['year'];
$address  = $_POST['address'];

// Basic validation
if ($password !== $confirm) {
    echo "<h2 style='color:red;'>Passwords do not match!</h2>";
    exit;
}

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert into database
$sql = "INSERT INTO users (name, dob, email, phone, password, gender, year, address)
        VALUES ('$name', '$dob', '$email', '$phone', '$hashedPassword', '$gender', '$year', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "<h2 style='color:green;'>Registration Successful!</h2>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
 .
