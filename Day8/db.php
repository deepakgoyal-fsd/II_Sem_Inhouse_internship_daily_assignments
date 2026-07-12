<?php
$host ="localhost";
$users ="root";
$password ="";
$dbname ="trip";
$conn = mysqli_connect($host, $users, $password, $dbname);
if(!$conn){
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>