<?php
$conn=mysqli_connect("localhost","root","","user_verification"
);
if(!$conn){
    die("Connection failed: ". mysqli_connect_error());
}
?>