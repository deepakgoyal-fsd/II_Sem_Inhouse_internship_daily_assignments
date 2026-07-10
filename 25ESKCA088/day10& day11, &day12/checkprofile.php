<?php
session_start();

include("dc_connect.php");   // Database connection
include("dashboardheader.php");
include("dashverticalcontent.php");

if(isset($_POST['name']) && isset($_POST['email'])){

    $id = $_SESSION['user_id'];   // Login user id

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "UPDATE users
            SET name='$name', email='$email'
            WHERE id='$id'";

    if(mysqli_query($conn, $sql)){
        echo "<script>alert('Profile Updated Successfully');</script>";
    }else{
        echo "<script>alert('Something went wrong');</script>";
    }
}
?>