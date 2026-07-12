<?php
// Set headers for JSON responses and CORS if needed
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

// Start secure session if not already started
if (session_status() === PHP_SESSION_NONE) {
    // Set secure session cookie parameters
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    // If running on HTTPS, uncomment the next line:
    // ini_set('session.cookie_secure', 1);
    
    session_start();
}

// Database Connection Settings
$db_host = 'localhost';
$db_user = 'root';
$db_pass = ''; // Default XAMPP MySQL password is empty
$db_name = 'bookmark_manager';

try {
    // Create PDO Connection
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8mb4", $db_user, $db_pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
} catch (PDOException $e) {
    // Return connection error as JSON
    http_response_code(500);
    echo json_encode([
        "status" => "error",
        "message" => "Database connection failed: " . $e->getMessage()
    ]);
    exit;
}

// Helper function to send JSON responses
function sendResponse($status, $message, $data = null, $code = 200) {
    http_response_code($code);
    $response = [
        "status" => $status,
        "message" => $message
    ];
    if ($data !== null) {
        $response["data"] = $data;
    }
    echo json_encode($response);
    exit;
}

// Helper function to verify if user is authenticated
function requireAuth() {
    if (!isset($_SESSION['user_id'])) {
        sendResponse("error", "Unauthorized. Please log in first.", null, 401);
    }
    return $_SESSION['user_id'];
}
