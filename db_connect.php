<?php

$host = "localhost";
$userName = "rohan";
$password = "54896";
$database = "industrial_training";
$port = 3857;

$conn = new mysqli($host, $userName, $password, $database,$port);

if($conn->connect_error){
    die ("some error".$conn->connect_error);
}

echo "Connection success";
echo "<br>";

// $result = $conn->query("show tables")->fetch_all();
// print_r($result);


?>