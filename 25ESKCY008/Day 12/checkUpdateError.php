<?php
session_start();
$error = "";
$newpassword = "";
$confirmpassword = "";
$oldpassword = "";
include_once("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newpassword = mysqli_real_escape_string($conn, $_POST["newpassword"]);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]);
    $oldpassword = mysqli_real_escape_string($conn, $_POST["oldpassword"]);

    if($newpassword == "" || $oldpassword == "" || $confirmpassword == ""){
        $error = "All fields are required.";
        echo $error;
    } 
    elseif($newpassword != $confirmpassword){
        $error = "Password does not match";
        echo $error;
    } 
    else{
        $selectQuery = "select * from user where id=" . $_SESSION['user_id'];
        $result = mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        if($user && password_verify($oldpassword, $user['password'])){
            $newpassword = password_hash($newpassword, PASSWORD_DEFAULT);
            $updateQuery = "update user set password='$newpassword' where id=" . $_SESSION['user_id'];
            mysqli_query($conn, $updateQuery);
            echo "Password updated successfully";
        } 
        elseif($user){
            echo "Old password is incorrect";
        } 
        else{
            echo "Invalid Credentials";
        }
    }
}
?>