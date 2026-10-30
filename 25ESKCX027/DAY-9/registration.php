<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phonenumber = $_POST['phone'];

if(empty($name)){
    echo "Name is empty <br>";
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "email is invalid";
}

if(!is_numeric($phonenumber)){
    echo "invalidphone number";
}

echo "value received : $name $email $phonenumber";

?>