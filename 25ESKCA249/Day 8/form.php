<?php

$name = $_POST["name"];
$gender = $_POST["gender"];
$email = $_POST["email"];
$txtPhone = $_POST["txtPhone"];
$pwdPassword = $_POST["pwdPassword"];
$branch = $_POST["branch"];
$dob = $_POST["dtDOB"];
$uploadedFileName = "";



echo "Values Received:<br>";
echo "Name: $name <br>";
echo "Gender: $gender <br>";
echo "Email: $email <br>";
echo "Phone: $txtPhone <br>";

$errors = [];

if(empty($name)){
    $errors[] = "Name is empty";
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $errors[] = "Email is invalid";
}
if(empty($pwdPassword)){
    $errors[] = "Password cannot be empty";
}
if($pwdPassword !== $_POST["pwdConfirmPassword"]){
    $errors[] = "Passwords do not match";
}
elseif(strlen($pwdPassword) < 8){
    $errors[] = "Password must be at least 8 characters";
}
if(empty($txtPhone)){
    $errors[] = "Phone Number is required";
}
elseif(!is_numeric($txtPhone)){
    $errors[] = "Phone Number is invalid";
}
elseif(strlen($txtPhone) != 10){
    $errors[] = "Phone Number must be 10 digits";
}

if(count($errors) > 0){
    foreach($errors as $error){
        echo $error . "<br>";
    }
}
else {
    echo "Form Submitted Successfully";
}
