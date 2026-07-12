<?php
session_start();
if(!isset($_SESSION["id"])){
    header("Location: login.php");
    exit();
}
include("db_connect.php");
$id = $_SESSION["id"];
$old_password = $_POST["old_password"];
$new_password = $_POST["new_password"];
$confirm_password = $_POST["confirm_password"];
$query = "SELECT password FROM users WHERE id='$id'";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
if($old_password != $row["password"]){
    echo "<script>
    alert('Old Password is Incorrect');
    window.location='change_password.php';
    </script>";
    exit();
}
if($new_password != $confirm_password){
    echo "<script>
    alert('New Password and Confirm Password do not match');
    window.location='change_password.php';
    </script>";
    exit();
}
$update = "UPDATE users
SET password='$new_password'
WHERE id='$id'";
if(mysqli_query($conn,$update)){
    echo "<script>
    alert('Password Changed Successfully');
    window.location='profile.php';
    </script>";
}else{
    echo "Error : ".mysqli_error($conn);
}
?>