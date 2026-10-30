<?php
$error = "";

include("database2.php");

$name = "";
$email = "";
$password = "";
$confirmpassword = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $name = mysqli_real_escape_string($conn, $_POST["name"]);
   $email = mysqli_real_escape_string($conn, $_POST["email"]);
   $password = mysqli_real_escape_string($conn, $_POST["password"]);
   $confirmpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]);

   $sql = "INSERT INTO user (name , email , password , confirmpassword) VALUES ('$name', '$email', '$password', '$confirmpassword')";


    if ($name == "" || $email == "" || $password == "" || $confirmpassword == ""){
        $error = "ALL FIELDS ARE REQUIRED";
        echo $error;
    } elseif ($password != $confirmpassword){
        $error = "PASSWORDS DO NOT MATCH";
        echo $error;
    } else {
        $insert_query = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";
        $_result = mysqli_query($conn, $insert_query);
        
        if ($_result) {
            header("Location: success.php");
            exit();
        } else {
            echo "Error occurred while storing data";
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
