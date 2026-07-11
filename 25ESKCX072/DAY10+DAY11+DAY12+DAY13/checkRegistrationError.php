<?php
$error="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirm_password = mysqli_real_escape_string($conn,$_POST["confirm_password"]);

    if ($name == "" || $email == "" || $password == "" || $confirm_password =="") {
        $error = "All fields are required.";
        echo $error;
    } 
    elseif($password!= $confirm_password){
        $error = " password does not match." ;
        echo $error;
    }
    else{
        //insert 
        $insertQuery ="insert into user (name,email,password) values('$name','$email','$password')";
        $result=mysqli_query($conn,$insertQuery);

        if ($result ){
            header ("Location: success.php");
        }else {
            echo "Error occured while storing data";
            echo "Error:".mysqli_error($conn);
        }
        
        exit();
    }
}

?>