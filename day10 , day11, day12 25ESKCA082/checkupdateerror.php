<?php
$error="";

$currentpassword="";
$newpassword="";
$confirmpassword="";
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $currentpassword=mysqli_real_escape_string($conn,$_POST['currentpassword']);
    $newpassword=mysqli_real_escape_string($conn,$_POST['newpassword']);
    $confirmpassword=mysqli_real_escape_string($conn,$_POST['confirmpassword']);

    if($currentpassword==""|| $newpassword==""|| $confirmpassword=="")
    {
        $error="all fields are required";
        echo $error;
    }elseif($newpassword!==$confirmpassword)
    {
        $error="new password does not match";
        echo $error;
    }
    else
    {
        $selectQuery="SELECT * FROM user WHERE id=".$_SESSION['user_id'];

        $result=mysqli_query($conn,$selectQuery);
        $user=mysqli_fetch_assoc($result);

        if($user && $user["password"] == $currentpassword){
            $updateQuery="update user set password='$newpassword' where id=".$_SESSION['user_id'];

            $result=mysqli_query($conn,$updateQuery);
            $user=mysqli_fetch_assoc($result);
            
        header("location:updateSuccess.php");
        exit();
        }
        elseif($user){
            echo"old  password does not match";
           exit();
        }
        else{
            echo"invalid  credentials";
            echo"error:".mysqli_error($conn);
        }
        
    }   
}
?>