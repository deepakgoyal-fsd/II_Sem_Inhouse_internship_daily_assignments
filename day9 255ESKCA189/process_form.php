<?php


    $sql = "INSERT INTO user
(name,roll_no,branch,cgpa,phone_number,created_on,updated_on,is_deleted,Password,confirm_password)
VALUES
('$name','25ESKCA030','$branch','$cgpa','8233949248',NOW(),NOW(),0,'$pwd','$cnfpwd')";

    if (mysqli_query($conn, $sql)) {
        echo "Student Registered Successfully!<br>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

?>