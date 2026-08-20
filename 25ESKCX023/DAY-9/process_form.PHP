<?php
include('db_connect.php');



    $name   = mysqli_real_escape_string($conn, $_POST["name"]);
    $email  = mysqli_real_escape_string($conn, $_POST["email"]);
    $branch = mysqli_real_escape_string($conn, $_POST["branch"]);
    $cgpa   = $_POST["cgpa"];

    $sql = "INSERT INTO `student` (`id`, `name`, `roll_no`, `branch`, `cgpa`) VALUES (NULL, '$name', '$email', '$branch', '$cgpa');

    if (mysqli_query($conn, $sql)) {
        echo "Student Registered Successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    
?>  