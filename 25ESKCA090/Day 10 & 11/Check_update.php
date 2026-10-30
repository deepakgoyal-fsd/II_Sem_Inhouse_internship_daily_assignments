<?php
session_start();


$error = "";

$confirmpassword = "";
$newpassword = "";
$oldpassword = "";

include('database2.php');

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

        $select_query = "SELECT * From user Where id = '$user_id'";
        
        $_result = mysqli_query($conn, $select_query);
        $_user = mysqli_fetch_assoc($_result);
        
        if($user && $user['password'] == $oldpassword) {
            $update_query = "update user set password = '$newpassword'  where id = '$user_id'";
            $update_result = mysqli_query($conn , $upadate_query);
            echo "User ID: " . $user_id . "<br>";
            echo "Rows affected: " . mysqli_affected_rows($conn);

            }
            elseif($_user){
                echo "Old Password does not matched";
                
                header("Location: update_success.php");
                exit();
        }
        else{
            echo "Invalid Credentials";
        }
        
    }
}

?>
