<?php
session_start();
$error="";

$old_password= "";
$new_password= "";
$confirm_password= "";

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $old_password = mysqli_real_escape_string($conn, $_POST['old_password']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);


     if ( empty($old_password) || empty($new_password) || empty($confirm_password)) {
        $error = "All fields are required.";
        echo $error;
    } else if ($new_password !== $confirm_password) {
        $error = "New password and confirm password do not match.";
        echo $error;
    } else {
        $selectQuery = "Select * from user where id=$_SESSION[user_id]"; 

        $result=mysqli_query($conn,$selectQuery);
        $user=mysqli_fetch_assoc($result);

        if ($user && $user['password'] === $old_password) {
            
            $updateQuery = "UPDATE user SET password='$new_password' WHERE id=$_SESSION[user_id]";
            $result=mysqli_query($conn, $updateQuery);
            $user=mysqli_fetch_assoc($result);
            

            header("Location: updateSuccess.php");
            exit();
        } else if ($user){
            echo "Old password is incorrect.";
            exit();
        }else {
            echo "Invalid Credentials";
            echo "error: " . mysqli_error($conn);
        }
    }
}
?>