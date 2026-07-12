<?php
include("db.php");

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));
    $confirmpassword = mysqli_real_escape_string($conn, trim($_POST['confirmpassword']));

    // Check Empty Fields
    if(empty($name) || empty($email) || empty($password) || empty($confirmpassword))
    {
        echo "<script>
        alert('All fields are required!');
        window.location='register.php';
        </script>";
        exit();
    }

    // Validate Email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        echo "<script>
        alert('Invalid Email Address!');
        window.location='register.php';
        </script>";
        exit();
    }

    // Password Match Check
    if($password != $confirmpassword)
    {
        echo "<script>
        alert('Passwords do not match!');
        window.location='register.php';
        </script>";
        exit();
    }

    // Check Duplicate Email
    $check = "SELECT * FROM user WHERE email='$email'";
    $result = mysqli_query($conn,$check);

    if(mysqli_num_rows($result) > 0)
    {
        echo "<script>
        alert('Email already exists!');
        window.location='register.php';
        </script>";
        exit();
    }

    // Default Role
    $role = "student";

    // Insert User
    $insert = "INSERT INTO user(name,email,password,role)
               VALUES('$name','$email','$password','$role')";

    if(mysqli_query($conn,$insert))
    {
        header("Location: success.php");
        exit();
    }
    else
    {
        echo "<script>
        alert('Registration Failed!');
        window.location='register.php';
        </script>";
    }

    mysqli_close($conn);
}
else
{
    header("Location: register.php");
    exit();
}
?>