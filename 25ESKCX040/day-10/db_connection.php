<?php
$conn = mysqli_connect("localhost", "root", "", "student_management");
if (!$conn) {
    die("<div class='alert alert-danger'>Connection Failed: " . mysqli_connect_error() . "</div>");
}
?>