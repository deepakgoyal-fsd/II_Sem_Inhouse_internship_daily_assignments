<?php
include('db_connect.php');

    $name = mysqli_real_escape_string($conn, $_POST['name']) ?? '';
    $email = mysqli_real_escape_string($conn, $_POST['email']) ?? '';
    $branch = mysqli_real_escape_string($conn, $_POST['branch']) ?? '';
    $cgpa = mysqli_real_escape_string($conn, $_POST['cgpa']) ?? '';

    $sql = "INSERT INTO students (name, email, branch, cgpa) VALUES ('$name', '$email', '$branch', '$cgpa')";

    if (mysqli_query($conn, $sql)) {
        echo "Student Registered successfully.";
    } else {
        echo "Error: "  . mysqli_error($conn);
    }
    ?>
