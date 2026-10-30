<?php
include("db_connect.php");
$error ="";

$newPassword ="";
$confirmPassword ="";
$oldPassword ="";


if($_SERVER["REQUEST_METHOD"] =="POST"){

$newPassword=mysqli_real_escape_string($conn,$_POST["newPassword"]);
$confirmPassword=mysqli_real_escape_string($conn,$_POST["confirmPassword"]);
$oldPassword=mysqli_real_escape_string($conn,$_POST["oldPassword"]);


    if( $newPassword =="" || $oldPassword =="" || $confirmPassword==""){
        
          
        $error="All fields are required.";
        echo $error;
        }elseif ($newPassword !=$confirmPassword){
            $error ="password does not match.";
        echo $error;
        
        

} else{
    $selectQuery = "Select * from user where id= "".$_SESSION['user_id']."";

    $result= mysqli_query($conn, $selectQuery);
    $user = mysqli_fetch_assoc($result);

    if($user && $user["password"]== $oldpassword){
    $updateQuery = "update user set password= '$newPassword' where id=$_SESSION['user_id'];
    mysqli_query($conn, $updateQuery);


        header("Location: updatesuccess.php");
        exit();
        }elseif($user){
            echo "Old password does not matched";
            exit();
        }
        else{
        
            echo "Invalid Credentials"; 
            echo "Error: " .mysqli_error($conn);
        }
    

}

?>


