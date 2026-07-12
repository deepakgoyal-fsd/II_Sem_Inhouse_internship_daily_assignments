<?php
$name=$_POST["name"];
$branch=$_POST["branch"];
$email=$_POST["email"];
$phoneNumber=$_POST["phoneNumber"];

//error
$error[]="Name is empty";

//empty
if(empty($name)){
    $error[]="Name is empty <br>";
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)) 
    {
        echo"email is invalid";
    }
    if(!is_numeric($phoneNumber)){
        echo"invalid phone number";
    }
echo"value received:$name $branch $email $phoneNumber";
    ?>
    