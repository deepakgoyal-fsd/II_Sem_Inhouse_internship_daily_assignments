<?php
include ('dbconnect.php');

$fullName = $_POST["name"];
$phonenumber = $_POST["phoneNumber"];
$email = $_POST["email"];
$age = $_POST["age"];
$address = $_POST["address"];



//empty
if(empty($fullName)){
    echo"Name is empty";
}
if(!is_numeric($phonenumber)){
    echo"invalid phone number";
}


$fullName_escaped = mysqli_real_escape_string($conn, $fullName);
$phonenumber_escaped = mysqli_real_escape_string($conn, $phonenumber);
$email_escaped = mysqli_real_escape_string($conn, $email);
$age_escaped = mysqli_real_escape_string($conn, $age);
$address_escaped = mysqli_real_escape_string($conn, $address);

$sql = "INSERT INTO user( name, phone_number) VALUES ('$fullName_escaped', '$phonenumber_escaped')";

if (mysqli_query($conn, $sql)) {
    echo "Student Registered Successfully!";
} else {
    echo "Error: " . mysqli_error($conn);
}


?>