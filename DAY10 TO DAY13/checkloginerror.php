<?php
session_start();
include("db.php");

if(isset($_POST['email']))
{
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $password = mysqli_real_escape_string($conn, trim($_POST['password']));

    // Empty Field Check
    if($email=="" || $password=="")
    {
        echo "<script>
        alert('All fields are required!');
        window.location='login.php';
        </script>";
        exit();
    }

    // Check Login
    $sql = "SELECT * FROM user
            WHERE email='$email'
            AND password='$password'";

    $result = mysqli_query($conn,$sql);

   if(mysqli_num_rows($result)==1)
{
    $row = mysqli_fetch_assoc($result);

    $_SESSION['id'] = $row['id'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['role'] = $row['role'];

    if($row['role'] == "student")
    {
        header("Location: dashboard.php");
    }
    elseif($row['role'] == "teacher")
    {
        header("Location: teacherdashboard.php");
    }
    elseif($row['role'] == "admin")
    {
        header("Location: admindashboard.php");
    }
    elseif($row['role'] == "superadmin")
    {
        header("Location: superadmindashboard.php");
    }

    exit();
}
else
{
    header("Location: login.php?error=1");
    exit();
}

mysqli_close($conn);
}  
?>