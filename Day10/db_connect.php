<?php

$host     = "localhost";
$user     = "root";
$password = "Bhavya123";
$database = "industrial_training";


mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = mysqli_connect($host, $user, $password, $database);
    mysqli_set_charset($conn, "utf8mb4");
} catch (mysqli_sql_exception $e) {
    die("Connection Failed: " . $e->getMessage());
}
?>