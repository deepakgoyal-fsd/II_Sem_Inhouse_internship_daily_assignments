<?php
$firstname=$_POST["firstname"];
$lastname=$_POST["lastname"];
$email=$_POST["email"];
$contact=$_POST["contact"];
$date=$_POST["date"];
$password=$_POST["password"];
$confirmpassword=$_POST[" confirmpassword"];
echo "values received: $firstname $lastname $email $contact $date $password $confirmpassword" ;
//empty
if(empty($name)){
    echo "name is empty <br>";
}
if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo "email is invalid";

}

if(!is _numeric($Contact)){
    echo "invalid contact";
}
 echo"values received:$n





?>