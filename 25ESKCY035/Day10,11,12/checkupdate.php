<?php

session_start();

$error = "";
$confirmpassword = "";
$newpassword = "";
$oldpassword = "";

include('SQLconnect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $oldpassword = mysqli_real_escape_string($conn, $_POST["oldpassword"]);
    $newpassword = mysqli_real_escape_string($conn, $_POST["newpassword"]);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]);

    if ($newpassword == "" || $oldpassword == "" || $confirmpassword == "") {
        $error = "All fields are required.";
        echo $error;     
    }
    elseif($newpassword != $confirmpassword){
        $error = "Password does not match";
        echo $error;
    }
     else {
        $user_id = $_SESSION["user_id"];

        $selectQuery = "SELECT * FROM user WHERE id = '$user_id'";
        
        $result = mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);
        
        if($user && $user['password'] == $oldpassword){
            
            $updateQuery = "update user set password = '$newpassword'  where id =  '$user_id'";
            $updateResult = mysqli_query($conn, $updateQuery);
            echo "User ID: " . $user_id . "<br>";
            echo "Rows affected: " . mysqli_affected_rows($conn);
            header("Location: updatesuccess.php");
            exit();
        }
        elseif($user){
            echo "Old Password does not matched";
        }
        else{
            echo "Invalid Credentials";
        }
        
    }
}
?>
