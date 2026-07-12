<?php

$host = "localhost";
$userName = "root";
$password = "";
$database = "industrial_training";
$port = 3307;

$conn = new mysqli($host, $userName, $password, $database,$port);

if($conn->connect_error){
    die ("some error".$conn->connect_error);
}

echo "Connection success";
echo "<br>";

// $result = $conn->query("show tables")->fetch_all();
// print_r($result);


?>