<?php

$conn = mysqli_connect("localhost", "root", "", "feedback_system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$roll_no = $_POST['roll_no'];
$topic = $_POST['topic'];
$rating = $_POST['rating'];
$feedback = $_POST['feedback'];

$sql = "INSERT INTO feedbak (name, email, phone, roll_no, topic, rating, feedback)
VALUES ('$name', '$email', '$phone', '$roll_no', '$topic', '$rating', '$feedback')";

if (mysqli_query($conn, $sql)) {
    echo "Thanks for submitting your feedback!";
} else {
    die("MySQL Error: " . mysqli_error($conn));
}

mysqli_close($conn);

?>
