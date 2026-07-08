<?php
include('db_connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name   = mysqli_real_escape_string($conn, $_POST["name"]);
    $email  = mysqli_real_escape_string($conn, $_POST["email"]);
    $branch = mysqli_real_escape_string($conn, $_POST["branch"]);
    $cgpa   = $_POST["cgpa"];

    $sql = "INSERT INTO `kunal` (`ID`, `Name`, `Roll_no.`, `Branch`, `cgpa`) VALUES (NULL, '$name', NULL, '$branch', '$cgpa'')";

    if (mysqli_query($conn, $sql)) {
        echo "Student Registered Successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);= 
    }
}pyu6
?>

