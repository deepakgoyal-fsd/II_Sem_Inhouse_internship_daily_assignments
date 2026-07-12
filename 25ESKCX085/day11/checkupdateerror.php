
<?php
$oldpassword = "";
$newpassword="";
$confirmpassword="";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$oldpassword =mysqli_real_escape_string($conn, $_POST["oldpassword"]);

$newpassword =mysqli_real_escape_string($conn, $_POST["newpassword"]);
$confirmpassword =mysqli_real_escape_string($conn, $_POST["confirmpassword"]);

}if( $oldpassword == "" || $newpassword == "" || $confirmpassword == ""){
    $error = "all fields are required.";
echo $error;

}

else{

    $selectQuery ="Select *from user where email='$email' and password = '$password';
    $result = mysqli_query($conn,$selectquery);
    $user=mysqli_fetch_assoc($result);

    if($user){
        session_start();
        $_SESSION['user_id']=$user['id'];
        $_SESSION['user_email']=$user['email'];
        $_SESSION['user_name']=$user['name'];
        
        header("Location: dashboard.php");
        exit();
    }
    else{
        echo "error occured while storing data";
        echo "error:" .mysqli_error($conn);
    }

    }

}
?>