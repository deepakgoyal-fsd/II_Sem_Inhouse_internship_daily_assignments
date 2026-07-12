<?php
$error = "";

$oldpassword = "";
$newpassword = "";
$confirmpassword = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $oldpassword =  mysqli_real_escape_string($conn,$_POST["oldpassword"]);
    $newpassword =  mysqli_real_escape_string($conn,$_POST["newpassword"]);
    $confirmpassword =  mysqli_real_escape_string($conn,$_POST["confirmpassword"]);

    if($oldpassword == "" || $newpassword == "" || $confirmpassword == ""){
        $error = "All fields are required";
        echo $error;
    }elseif($newpassword != $confirmpassword){
        $error = "password does not match";
        echo $error;
    }
    else{
        $selectQuery = "Select * from user where id=$_SESSION['user_id']";
        $result = mysqli_query($conn, $selectQuery);
        // selectquery hamesha success hi return krta haii chahe apn wrong password bhi kyu na daale!!!
        // for this we use mysqli_fetch_assoc.
        $user = mysqli_fetch_assoc($result);

        if($user && $user["password"] == $oldpassword){
        $updateQuery = "update user set password = '$newpassword' where id=$_SESSION['user_id']";
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