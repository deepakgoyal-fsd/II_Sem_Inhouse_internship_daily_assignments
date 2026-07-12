<?php

include("db_connect.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$name = mysqli_real_escape_string($conn, $_POST['fullname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$branch = mysqli_real_escape_string($conn, $_POST['branch']);
$cgpa = $_POST['cgpa'];
$sql = "INSERT INTO user (fullname, email, branch, cgpa)
VALUES ('$name', '$email', '$branch', '$cgpa')";

if (mysqli_query($conn, $sql)) {
echo "Student Registered Successfully!";
} else {
echo "Error: " . mysqli_error($conn);
}}
$fullname = $_POST["fullname"];
$email = $_POST["email"];
$phoneNumber = $_POST["phoneNumber"];
$dtDOB = $_POST["dtDOB"];
$gender = $_POST["gender"];
$address = $_POST["address"];

$errors = [];
$success = "";
//empty

if(empty($fullname)){
    echo "Name is empty <br>";
}

if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo "email is invalid";
}

if(!is_numeric($phoneNumber)){
    echo "invalid phone number";
}


echo "Values received : $fullname $email $phoneNumber $dtDOB $gender $address";

?>
