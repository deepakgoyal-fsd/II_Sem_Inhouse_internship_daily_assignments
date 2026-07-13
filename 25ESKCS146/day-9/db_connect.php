<?php

$conn=mysqli_connect("localhost","root","12345","student");

if(!$conn) {
    die("connection failed:".
    mysqli_connect_error());
}
?>