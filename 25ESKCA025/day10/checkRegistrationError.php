<?php
$error= "";
$name="";
$email="";
$password="";
$confirmPassword="";
include("db_connect.php");

if($_SERVER["REQUEST_METHOD"] =="POST"){

    $name = $_POST["name"]??"";
    $email = $_POST["email"]??"";
    $password = $_POST["password"]??"";
     $confirmPassword = $_POST["confirmPassword"]??"";

    if($name=="" || $email =="" || $password =="" || $confirmPassword==""){
        $name = mysqli_real_escape_string($conn, $_POST["name"]);
         $email = mysqli_real_escape_string($conn, $_POST["email"]);
          $password = mysqli_real_escape_string($conn, $_POST["password"]);
           $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);
        $error="All fields are required.";
        echo $error;
        }elseif ($password !=$confirmPassword){
            $error ="password does not match.";
            echo $error;
        
        

} else{
    $checkEmailQuery = "SELECT * FROM user WHERE email='$email'";
    $result= mysqli_query($conn, $checkEmailQuery);
    if(mysqli_num_rows($result)>0){
        $error = "Email already exists.";
        echo $error;
    } else {
    $insertQuery ="INSERT INTO user(name, email, password) values('$name','$email', '$password')";

    $insertresult= mysqli_query($conn, $insertQuery);
    if($insertresult){
        header("Location: success.php");
        exit();
        }else{
            echo "Error occurred while storing data";
            echo "Error: " .mysqli_error($conn);
        }

        }
    }
}

?>
