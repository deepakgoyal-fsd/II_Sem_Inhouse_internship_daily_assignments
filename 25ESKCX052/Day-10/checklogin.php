<?php

include("db_connect.php");

if($_SERVER["REQUEST_METHOD"]=="POST"){

$Email = mysqli_real_escape_string($conn,$_POST["Email"]);
$Password = mysqli_real_escape_string($conn,$_POST["Password"]);

$query = "SELECT * FROM user WHERE email='$Email' AND password='$Password'";

$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result) > 0){

    echo "<h2 style='color:green;'>Login Successful!</h2>";

}
else{

    echo "<h2 style='color:red;'>Invalid Email or Password!</h2>";

}
}

?>