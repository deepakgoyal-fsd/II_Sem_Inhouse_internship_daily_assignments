<?php
session_start();
include("db_connect.php");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=mysqli_real_escape_string($conn,$_POST["username"]);
    $password=mysqli_real_escape_string($conn,$_POST["password"]);
    if(empty($username)||empty($password)){
        echo"<script>alert('All Fields are Required');
        window.location='admin_login.php';
        </script>";
        exit();
    }
    $query = "SELECT * FROM admin WHERE username='$username' and password='$password'";
    $result = mysqli_query($conn,$query);
    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION["admin_id"] = $row["id"];
        $_SESSION["admin_username"] = $row["username"];
        header("location: admin_dashboard.php");
        exit();
    }
    else{
        echo"<script>alert('Invalid Username and password');
        window.location='admin_login.php';
        </script>";
    }
}
?>