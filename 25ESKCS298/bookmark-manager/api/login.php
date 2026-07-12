<?php
require_once 'config.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse("error", "Method not allowed. Use POST.", null, 405);
}

// Get request parameters (handles standard POST and JSON POST)
$username_or_email = isset($_POST['username_or_email']) ? trim($_POST['username_or_email']) : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

// Fallback for JSON inputs
if (!$username_or_email || !$password) {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    if ($data) {
        $username_or_email = isset($data['username_or_email']) ? trim($data['username_or_email']) : $username_or_email;
        $password = isset($data['password']) ? $data['password'] : $password;
    }
}

if (empty($username_or_email) || empty($password)) {
    sendResponse("error", "Username/Email and Password are required.", null, 400);
}

try {
    // Retrieve user by username or email
    $stmt = $pdo->prepare("SELECT id, username, email, password_hash FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username_or_email, $username_or_email]);
    $user = $stmt->fetch();

    // Verify user exists and password is correct
    if ($user && password_verify($password, $user['password_hash'])) {
        // Regenerate session ID to prevent session fixation attacks
        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];

        sendResponse("success", "Login successful.", [
            "user_id" => $user['id'],
            "username" => $user['username']
        ]);
    } else {
        sendResponse("error", "Invalid username/email or password.", null, 401);
    }

} catch (PDOException $e) {
    sendResponse("error", "Database error: " . $e->getMessage(), null, 500);
}
