<?php

$name = $_POST["txtName"];
$email = $_POST["txtEmail"];
$number = $_POST["numPhone"];
$gender = $_POST["gender"];
$password = $_POST["pwdPassword"];
$confPassword = $_POST["pwdConformPassword"];

//input check

$error = [];
if (empty($name)) {
    $error[] = "Name is empty";
}
if (empty($gender)) {
    $error[] = "Select one gender";
}

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error[] = "email is invalid";
}

if (strlen($number) != 10) {
    $error[] = "Phone number should be 10 digits";
}

if (!is_numeric($number)) {
    $error[] = "Phone Number should be in Digits";
}
if (empty($password)) {
    $error[] = "Password section is empty";
}

// if(strlen($confPassword))
// {
//     $error[] = "Confirm Password section is empty";
// }

if(strlen($password) != strlen($confPassword))
{
    $error[] = "confirm password should be same with password box";
}

if (count($error) != 0) {
    foreach ($error as $error)
    {
        echo "$error.<br>";
    }
}
else{
    echo"Values Received:<br>";
    echo"Name:$name<br>";
    echo"Email:$email<br>";
    echo"Phone Number:$number<br>";
    echo"Gender:$gender<br>";
    echo"Password:$password<br>";
}