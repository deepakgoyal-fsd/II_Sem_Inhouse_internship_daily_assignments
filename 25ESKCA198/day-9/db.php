<?php

$conn = mysqli_connect("localhost","root","","student_db");

if(!$conn){
    die("Connection Failed : " . mysqli_connect_error());
}

?>