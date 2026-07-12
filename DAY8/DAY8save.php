<?php
include("db_connect3.php");

if(isset($_POST['fullname']))
{
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $course = trim($_POST['course']);
    $cgpa = trim($_POST['cgpa']);

    // Server-side Validation

    if(empty($fullname) || empty($email) || empty($phone) || empty($course) || empty($cgpa))
    {
        echo "<script>
        alert('All fields are required!');
        window.location='DAY8index.php';
        </script>";
        exit();
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<script>
        alert('Invalid Email Address!');
        window.location='DAY8index.php';
        </script>";
        exit();
    }

    if(!preg_match('/^[0-9]{10}$/',$phone))
    {
        echo "<script>
        alert('Phone number must be 10 digits!');
        window.location='DAY8index.php';
        </script>";
        exit();
    }

    if($cgpa < 0 || $cgpa > 10)
    {
        echo "<script>
        alert('CGPA should be between 0 and 10');
        window.location='DAY8index.php';
        </script>";
        exit();
    }

    // Duplicate Email Check
    $check = "SELECT * FROM students WHERE email='$email'";
    $result = mysqli_query($conn,$check);

    if(mysqli_num_rows($result) > 0)
    {
        echo "<script>
        alert('Email already exists!');
        window.location='DAY8index.php';
        </script>";
        exit();
    }

    // Insert Record
    $sql = "INSERT INTO students(fullname,email,phone,course,cgpa)
            VALUES('$fullname','$email','$phone','$course','$cgpa')";

    if(mysqli_query($conn,$sql))
    {
        echo "<script>
        alert('Student Registered Successfully!');
        window.location='DAY8display.php';
        </script>";
    }
    else
    {
        echo "<script>
        alert('Error: ".mysqli_error($conn)."');
        window.location='DAY8index.php';
        </script>";
    }
}

mysqli_close($conn);
?>