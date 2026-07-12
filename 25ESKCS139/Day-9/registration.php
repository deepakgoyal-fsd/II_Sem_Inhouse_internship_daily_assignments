<?php

// Database Connection
include('db_connect.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get Form Data
    $name = mysqli_real_escape_string($conn,$_POST['name']);
    $branch = mysqli_real_escape_string($conn,$_POST['branch']);
    $rollno = mysqli_real_escape_string($conn,$_POST['rollno']);
    $collegeid = mysqli_real_escape_string($conn,$_POST['collegeid']);
    $cgpa = mysqli_real_escape_string($conn,$_POST['cgpa']);

    $sql = "INSERT INTO students (name, branch, rollno, collegeid, cgpa)
            VALUES ('$name', '$branch', '$rollno', '$collegeid', '$cgpa')";

    // Execute Query
    if (mysqli_query($conn, $sql)) {
        echo "<h2 style='color:green; text-align:center;'>
                Registration Successful!
              </h2>";
    } else {
        echo "<h2 style='color:red; text-align:center;'>
                Error: " . mysqli_error($conn) . "
              </h2>";
    }

} else {
    echo "<h2 style='color:red; text-align:center;'>
            Invalid Request!
          </h2>";
}

// Close Connection
mysqli_close($conn);

?>
