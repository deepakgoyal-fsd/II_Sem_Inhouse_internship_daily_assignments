<?php
include('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $rollno = mysqli_real_escape_string($conn, $_POST['rollno']);
    $cgpa = mysqli_real_escape_string($conn, $_POST['cgpa']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phonenumber']);
    $branch = mysqli_real_escape_string($conn, $_POST['branch']);
    
    $sql = "INSERT INTO user (name, rollno, cgpa, phonenumber, branch)
            VALUES ('$name', '$rollno', '$cgpa', '$phonenumber', '$branch')";
            
    if (mysqli_query($conn, $sql)) {
        echo "student registered successfully";
    } else {
        echo "error: " . mysqli_error($conn);
    }
}
?>