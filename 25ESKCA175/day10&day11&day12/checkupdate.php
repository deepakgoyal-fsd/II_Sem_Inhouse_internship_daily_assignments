<?php
$error = "";

$confirmpassword = "";
$newpassword = "";
$oldpassword = "";

include('dc_connect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $oldpassword = mysqli_real_escape_string($conn, $_POST["oldpassword"]);
    $newpassword = mysqli_real_escape_string($conn, $_POST["newpassword"]);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]);

    if ($newpassword == "" || $oldpassword == "" || $confirmpassword == "") {
        $error = "All fields are required.";     
    }
    elseif($newpassword != $confirmpassword){
        $error = "Password does not match";
    }
     else {
        $selectQuery = "SELECT * FROM user WHERE id = '".$_SESSION['user_id']."'";
$result = mysqli_query($conn, $selectQuery);

$user = mysqli_fetch_assoc($result);

if($user){

    if($user['password'] == $oldpassword){

        $updateQuery = "UPDATE user
                        SET password = '$newpassword'
                        WHERE id = '".$_SESSION['user_id']."'";

        mysqli_query($conn, $updateQuery);

        header("Location: updatesuccess.php");
        exit();

    } else {
        echo "Old Password does not match";
    }

}
else{
    echo "Invalid Credentials";
}
        
    }
}
?>