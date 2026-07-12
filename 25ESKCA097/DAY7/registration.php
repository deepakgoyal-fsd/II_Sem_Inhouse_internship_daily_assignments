<?php

$Fullname= $_POST['Fullname'];
$email = $_POST['email'];
$branch= $_POST['branch'];
$phoneNumber=$_POST['phoneNumber'];


echo "Values Received: <br> $Fullname <br>  $email <br> $branch <br> $phoneNumber <br>";

if(empty($Fullname)){
    echo "Name is empty";
}if(!filter_var($email.FILTER_VALIDATE_EMAIL)){
    echo "email is invalid";
};
if(!is_numeric($phoneNumber)){
    echo "invalid phone number";
}
echo "value received: <br> $Fullname <br> $email <br> $branch <br> $phoneNumber";
?>