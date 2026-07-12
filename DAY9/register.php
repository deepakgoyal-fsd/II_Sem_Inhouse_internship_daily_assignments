<?php
include "db_connect.php";

if(isset($_POST['name']))
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $course = trim($_POST['course']);
    $cgpa = trim($_POST['cgpa']);

    // Server-side Validation
    if(empty($name) || empty($email) || empty($phone) || empty($course) || empty($cgpa))
    {
        header("Location: index.php?error=All fields are required");
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("Location: index.php?error=Invalid Email");
        exit();
    }

    // Check Duplicate Email
    $check = mysqli_query($conn, "SELECT * FROM students WHERE email='$email'");

    if(mysqli_num_rows($check) > 0)
    {
        header("Location: index.php?error=Email already exists");
        exit();
    }

    // Insert Data
    $sql = "INSERT INTO students(name,email,phone,course,cgpa)
            VALUES('$name','$email','$phone','$course','$cgpa')";

    if(mysqli_query($conn, $sql))
    {
        header("Location: index.php?success=1");
        exit();
    }
    else
    {
        header("Location: index.php?error=Registration Failed");
        exit();
    }
}
else
{
    header("Location: index.php");
    exit();
}
?>