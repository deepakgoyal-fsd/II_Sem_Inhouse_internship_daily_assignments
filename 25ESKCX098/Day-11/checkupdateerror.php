

<?php
$error = "";


$newpassword="";
$confirmpassword="";
$oldpassword="";

if($_SERVER["REQUEST_METHOD"] == "POST"){


$newpassword=mysqli_real_escape_string($conn, $_POST["newpassword"]);
$confirmpassword =mysqli_real_escape_string($conn, $_POST["confirmpassword"]);

$oldpassword =mysqli_real_escape_string($conn, $_POST["oldpassword"]);



if( $newpassword == "" || $confirmpassword == "" || $oldpassword == ""){
    $error = "all fields are required.";
echo $error;


}elseif($newpassword != confirmpassword){
  $error = "password does not match";
  echo $error;
}

    else{
    //insert
    $selectquery ="SELECT * from user where email ='$email' and password = '$password';";

    $result = mysqli_query($conn,$selectquery);
    $user = mysqli_fetch_assoc($result);
    if($user){

    session_start();

    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_name'] = $user['name'];
    $_SESSION['user_email'] = $user['email'];



        header("Location: login.php");
        exit();
    }
    else{
        echo "invalid credentials";
        echo "error:" .mysqli_error($conn);
    }

    }
}

?>
