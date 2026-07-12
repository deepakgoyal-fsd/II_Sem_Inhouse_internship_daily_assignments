<?php
include
if (isset($_POST['name'], $_POST['email'], $_POST['phoneNumber'])){


$name = $_POST["name"];
$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];
echo "Name: $name <br>";
echo "Email: $email <br>";
echo "Phone: $phoneNumber";



}
if(empty($name)){
    echo "name is empty";
}
elseif(notfilter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "email is invalid";
}
echo "values received : $name $email $phoneNumber";
?>