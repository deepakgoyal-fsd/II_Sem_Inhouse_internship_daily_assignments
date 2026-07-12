<?php
// db_connect.php

// Database connection details
$servername = "localhost";
$username = "root";      // default username for XAMPP
$password = "";          // leave blank if no password set
$dbname = "student";     // your database name


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed :".mysqli_connect_error());
}