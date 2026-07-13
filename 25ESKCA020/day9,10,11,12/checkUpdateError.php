<?php
$error = "";

$oldpassword = "";
$newpassword = "";
$confirmpassword = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $oldpassword =  mysqli_real_escape_string($conn,$_POST["oldpassword"]);
    $newpassword =  mysqli_real_escape_string($conn,$_POST["newpassword"]);
    $confirmPassword =  mysqli_real_escape_string($conn,$_POST["confirmPassword"]);

    if($oldpassword == "" || $newpassword == "" || $confirmPassword == ""){
        $error = "All fields are required";
        echo $error;
    }elseif($newpassword != $confirmPassword){
        $error = "password does not match";
        echo $error;
    }
    else{
        $user_id = $_SESSION['user_id'];
        $selectQuery = "SELECT * FROM user WHERE id = $user_id";
        $result = mysqli_query($conn, $selectQuery);
        // selectquery hamesha success hi return krta haii chahe apn wrong password bhi kyu na daale!!!
        // for this we use mysqli_fetch_assoc.
        $user = mysqli_fetch_assoc($result);

        if($user && $user["password"] == $oldpassword){
        $updateQuery = "UPDATE user SET password = '$newpassword' WHERE id = $user_id";
        $result = mysqli_query($conn, $updateQuery);
        
           header("Location: updatesuccess.php");
           exit();
        }elseif($user){
            echo "old password does not matached";
            exit();
        }
        else{
            echo "Invalid credentials";
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>