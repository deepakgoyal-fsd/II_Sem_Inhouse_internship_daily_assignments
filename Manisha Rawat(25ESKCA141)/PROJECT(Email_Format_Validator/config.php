<?php

/*======================================================
        EMAIL VALIDATOR PRO
        DATABASE CONNECTION
        config.php
======================================================*/


// Database details

$server = "localhost";

$username = "root";

$password = "";

$database = "email_validator";




// Create connection

$conn = new mysqli(

    $server,

    $username,

    $password,

    $database

);




// Check connection

if($conn->connect_error){


    die("Database Connection Failed: " . $conn->connect_error);


}


// Connection successful

?>