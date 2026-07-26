<?php
session_start();
header("Content-Type: application/json");

require_once "db.php";

if (!$conn) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "error" => "Database connection failed: " . mysqli_connect_error()
    ]);
    exit;
}

if (empty($_POST)) {
    http_response_code(400);
    echo json_encode([
        "success" => false,
        "error" => "No POST data received"
    ]);
    exit;
}

// Try POST first, fall back to session username
$username      = isset($_POST["username"])        ? $_POST["username"]        : (isset($_SESSION['username']) ? $_SESSION['username'] : "Anonymous");
$duration      = isset($_POST["duration"])        ? (int)$_POST["duration"]   : 0;
$wpm           = isset($_POST["wpm"])             ? (int)$_POST["wpm"]        : 0;
$accuracy      = isset($_POST["accuracy"])        ? (int)$_POST["accuracy"]   : 0;
$correctWords  = isset($_POST["correct_words"])   ? (int)$_POST["correct_words"] : 0;
$charsTyped    = isset($_POST["characters_typed"]) ? (int)$_POST["characters_typed"] : 0;

$stmt = mysqli_prepare($conn,
    "INSERT INTO results (username, duration, wpm, accuracy, correct_words, characters_typed)
     VALUES (?, ?, ?, ?, ?, ?)"
);

if (!$stmt) {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "error" => "SQL prepare failed: " . mysqli_error($conn)
    ]);
    exit;
}

mysqli_stmt_bind_param($stmt, "siiiii", $username, $duration, $wpm, $accuracy, $correctWords, $charsTyped);

if (mysqli_stmt_execute($stmt)) {
    echo json_encode([
        "success" => true,
        "message" => "Result saved successfully"
    ]);
} else {
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "error" => "SQL execute failed: " . mysqli_stmt_error($stmt)
    ]);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>