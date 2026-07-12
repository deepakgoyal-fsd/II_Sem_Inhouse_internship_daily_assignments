<?php
session_start();
include "../common/db_connect.php";

if (!isset($_SESSION['is_loggedin']) || $_SESSION['is_loggedin'] !== true) {
    header("Location: index.php");
    exit;
}

$id = intval($_GET['id'] ?? 0);

if ($id <= 0) {
    header("Location: students.php");
    exit;
}

$stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();

header("Location: students.php");
exit;
