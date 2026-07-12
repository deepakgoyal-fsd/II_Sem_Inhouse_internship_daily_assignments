<?php
session_start();
include("db_connect.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username_email = mysqli_real_escape_string($conn,$_POST["username_email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    if(empty($username_email) || empty($password)){
        echo "<script>
        alert('All fields are required');
        window.location='login.php';
        </script>";
        exit();
    }
    $query = "SELECT * FROM users
              WHERE username='$username_email'
              OR email='$username_email'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
        if($password == $row["password"]){
            $_SESSION["id"] = $row["id"];
            $_SESSION["fullname"] = $row["fullname"];
            $_SESSION["username"] = $row["username"];
            header("Location: dashboard.php");
            exit();
        }
        else{
            echo "<script>
            alert('Incorrect Password');
            window.location='login.php';
            </script>";
        }
    }
    else{
        echo "<script>
        alert('Username or Email does not exist');
        window.location='login.php';
        </script>";
    }
}
?>