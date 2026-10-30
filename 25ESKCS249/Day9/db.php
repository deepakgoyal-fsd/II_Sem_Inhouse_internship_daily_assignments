<?php
$conn = new mysqli("localhost", "root", "", "student_portal");

if ($conn->connect_error) {
    die("Database Error");
}
?>