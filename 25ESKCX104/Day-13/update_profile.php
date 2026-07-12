<?php

session_start();

if(!isset($_SESSION["id"])){
    header("Location: login.php");
    exit();
}

include("db_connect.php");

$id = $_SESSION["id"];

$fullname = mysqli_real_escape_string($conn,$_POST["fullname"]);
$email = mysqli_real_escape_string($conn,$_POST["email"]);
$phone = mysqli_real_escape_string($conn,$_POST["phone"]);
$dob = mysqli_real_escape_string($conn,$_POST["dob"]);
$address = mysqli_real_escape_string($conn,$_POST["address"]);
$city = mysqli_real_escape_string($conn,$_POST["city"]);
$state = mysqli_real_escape_string($conn,$_POST["state"]);

$query = "UPDATE users SET

fullname='$fullname',
email='$email',
phone='$phone',
dob='$dob',
address='$address',
city='$city',
state='$state'

WHERE id='$id'";

if(mysqli_query($conn,$query)){

    $_SESSION["fullname"] = $fullname;

    echo "<script>

    alert('Profile Updated Successfully');

    window.location='profile.php';

    </script>";

}

else{

    echo "Error : ".mysqli_error($conn);

}

?>