<?php
// Report mysqli errors as exceptions instead of relying on manual checks
// scattered through every script that touches the database.
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$host     = 'localhost';
$user     = 'root';
$password = '';
$database = 'students_management';

try {
    $conn = mysqli_connect($host, $user, $password, $database);
    mysqli_set_charset($conn, 'utf8mb4');
} catch (mysqli_sql_exception $e) {
    die("Database Connection Failed: " . $e->getMessage());
}

// echo "Connected Successfully";
