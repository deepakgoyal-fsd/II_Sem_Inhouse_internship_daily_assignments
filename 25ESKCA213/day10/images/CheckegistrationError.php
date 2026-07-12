<?php
include ("db_connect.php");
$error = "";

$name = "";
$email = "";
$password = "";
$confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($conn,$_POST["confirmPassword"]);

    if ($name == "" || $email == "" || $password == "" || $confirmPassword == "") {

        
        echo $error;

    } elseif ($password != $confirmPassword) {

    $error = "Password does not match.";
    echo $error;

} elseif (strlen($password) < 8) {

    $error = "Password must be at least 8 characters.";
    echo $error;

} elseif (!preg_match("/[A-Z]/", $password)) {

    $error = "Password must contain at least one uppercase letter.";
    echo $error;

} elseif (!preg_match("/[a-z]/", $password)) {

    $error = "Password must contain at least one lowercase letter.";
    echo $error;

} elseif (!preg_match("/[0-9]/", $password)) {

    $error = "Password must contain at least one number.";
    echo $error;

} elseif (!preg_match("/[@$!%*?&]/", $password)) {

    $error = "Password must contain at least one special character.";
    echo $error;

} else {
//insert
$insertQuery = "Insert into user(name , email , password) values('$name','$email','$password')";

$result = mysqli_query($conn , $insertQuery);

if($result){
 header("Location: success.php");
 exit();
}else{
    echo "error occurred while storing data";
    echo "Error: " . mysqli_error($conn);
}
        

    }
}
?>