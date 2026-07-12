<?php

include("db_connect.php");

$id = $_POST["id"];
$name = $_POST["user_name"];
$email = $_POST["user_email"];
$branch = $_POST["user_branch"];
$cgpa = $_POST["user_cgpa"];
$phone = $_POST["user_mobile"];
$city = $_POST["user_city"];


$sql = "UPDATE STUDENT SET 
           NAME = '$name',
            EMAIL = '$email',
             BRANCH = '$branch',
              CGPA = '$cgpa',
               PHONE = '$phone',
                CITY = '$city'
                WHERE ID ='$id'";

$result = mysqli_query($conn , $sql);

if($result){
    echo "updated successfully";
}
else {
    echo "error";
}
