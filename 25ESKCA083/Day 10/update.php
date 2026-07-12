<?php
// Database connection
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "webd";   // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id    = $_POST['id'];      // hidden field for user id
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    // Use prepared statement for security
    $stmt = $conn->prepare("UPDATE users SET name=?, email=?, phone=? WHERE id=?");
    $stmt->bind_param("sssi", $name, $email, $phone, $id);

    if ($stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>