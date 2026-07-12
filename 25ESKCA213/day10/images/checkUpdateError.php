<?php
include ("db_connect.php");
$error = "";

$newPassword = "";
$confirmPassword = "";
$oldPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    
    $newPassword = mysqli_real_escape_string($conn,$_POST["newPassword"]);
    $confirmPassword = mysqli_real_escape_string($conn,$_POST["confirmPassword"]);
    $oldPassword = mysqli_real_escape_string($conn,$_POST["oldPassword"]);
    

    if ( $newPassword == "" || $confirmPassword == "" || $oldPassword == "" ) {

        
        echo $error;

    } else {
//insert
$selectQuery = "Select * from user where id=".$_SESSION['user_id'];


$result = mysqli_query($conn , $selectQuery);
$user = mysqli_fetch_assoc($result);
$updateQuery = "UPDATE user 
                SET password = '$newPassword' 
                WHERE id = '".$_SESSION['user_id']."'";

$updateResult = mysqli_query($conn, $updateQuery);

if ($updateResult) {
    echo "Password Updated Successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}
if($user && $user["password"] ){
    session_start();

    $_SESSION['user_id']    =$user['id'];
    $_SESSION['user_name']  =$user['name'];
    $_SESSION['user_email'] =$user['email'];
 header("Location: dashboard.php");
 exit();
}else{
    echo "Invalid Credentials";
    echo "Error: " . mysqli_error($conn);
}
        

    }
}
?>