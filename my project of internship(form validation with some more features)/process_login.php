<?php

session_start();

include "db_connect.php";

if(isset($_POST['login']))
{

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user WHERE email='$email'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)>0)
    {

        $row = mysqli_fetch_assoc($result);

        if($password == $row['password'])
        {

            // $_SESSION['user'] = $row['full_name'];
            $_SESSION['user'] = $row['email'];

            header("Location: dashboard.php");

        }
        else
        {

            echo "<script>
            alert('Incorrect Password');
            window.location='login.php';
            </script>";

        }

    }
    else
    {

        echo "<script>
        alert('Email Not Registered');
        window.location='login.php';
        </script>";

    }

}

?>