<?php

$host = "localhost";
$userName = "root";
$password = "";
$database = "industrial-training";
//$port = 3306;

$conn = new mysqli($host, $userName, $password, $database);

if($conn->connect_error){
    die ("some error".$conn->connect_error);
}

echo "Connection success";
echo "<br>";

// $result = $conn->query("show tables")->fetch_all();
// print_r($result);


?>