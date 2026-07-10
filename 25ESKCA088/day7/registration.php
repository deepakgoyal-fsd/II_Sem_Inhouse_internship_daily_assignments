<?php
$fname = $_POST["fname"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$date = $_POST["date"];
$branch = $_POST["branch"];
$city = $_POST["city"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];

//empty
if(empty($fname)){
    echo "Name is empty <br>";
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "Email is invalid...";

}
if(!is_numeric($phone)){
    echo "invalid phonr number";
}
if(empty($date)){
    echo "Fill a valid Date of Birth";
}
if(!preg_match("/^[a-zA-Z ]+$/", $city)){
    echo "Invalid city";
}

if (!preg_match("/^[a-zA-Z0-9\s,.\-\/#]+$/", $address1)) {
    echo "Invalid Address";
}


if(empty($branch)){
    echo "Please select branch <br>";
}

echo "value received : $fname  $email $phone";

?> 