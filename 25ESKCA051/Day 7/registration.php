<?php

// $Name = $_GET["Name"];
// $Branch = $_GET["Branch"];
// $Email = $_GET["Email"];
// $PhoneNumber = $_GET["PhoneNumber"];

$Name = $_POST['Name'];
$Email = $_POST['Email'];
$PhoneNumber= $_POST['PhoneNumber'];
$Password=$_POST['Password'];


echo "Values Received: <br> $Name <br>  $Email <br> $PhoneNumber <br> $Password <br>";

if(empty($Name)){
    echo "Name is empty";
}if(!filter_var($Email.FILTER_VALIDATE_EMAIL)){
    echo "Email is invalid";
};
if(!is_numeric($PhoneNumber)){
    echo "invalid phone number";
}
echo "value received: $Name $Email $PhoneNumber $Password";
?>