<?php
session_start();
header("Content-Type: application/json");

$username = isset($_POST['username']) ? trim($_POST['username']) : '';

if ($username !== '') {
    $_SESSION['username'] = $username;
    echo json_encode(["success" => true, "username" => $username]);
} else {
    http_response_code(400);
    echo json_encode(["success" => false, "error" => "No username provided"]);
}
?>