<?php

$conn = mysqli_connect(
    "localhost",
    "root",
    "",
    "login_system"
);

if(!$conn){
    die("Database Connection Failed");
}

?>