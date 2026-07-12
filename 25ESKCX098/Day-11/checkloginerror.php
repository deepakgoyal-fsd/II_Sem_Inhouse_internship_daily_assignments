

<?php
$error = "";

$email="";
$password="";

if($_SERVER["REQUEST_METHOD"] == "POST"){


$email =mysqli_real_escape_string($conn, $_POST["email"]);
$password =mysqli_real_escape_string($conn, $_POST["password"]);



if( $email == "" || $password == ""){
    $error = "all fields are required.";
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



        header("Location: dashboard.php");
        exit();
    }
    else{
        echo "invalid credentials";
        echo "error:" .mysqli_error($conn);
    }

    }
}

?>
