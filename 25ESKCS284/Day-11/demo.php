<?php session_start();
$_SESSION['user'] = array(
    "name" => "Rishabh",
    "role" => "student",
    "city" => "Jaipur"
);

echo $_SESSION['user']['name'];
echo "<br>";
echo $_SESSION['user']['role'];
