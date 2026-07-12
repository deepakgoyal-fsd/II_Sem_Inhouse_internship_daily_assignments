 <?php
require_once 'config.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    sendResponse("error", "Method not allowed. Use POST.", null, 405);
}

// Get request parameters (handles standard POST and JSON POST)
$username = isset($_POST['username']) ? trim($_POST['username']) : null;
$email = isset($_POST['email']) ? trim($_POST['email']) : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : null;

// Fallback for JSON inputs (if jQuery sends contentType: 'application/json')
if (!$username || !$email || !$password) {
    $json = file_get_contents('php://input');
    $data = json_decode($json, true);
    if ($data) {
        $username = isset($data['username']) ? trim($data['username']) : $username;
        $email = isset($data['email']) ? trim($data['email']) : $email;
        $password = isset($data['password']) ? $data['password'] : $password;
        $confirm_password = isset($data['confirm_password']) ? $data['confirm_password'] : $confirm_password;
    }
}

// Validations
if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
    sendResponse("error", "All fields are required.", null, 400);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    sendResponse("error", "Please provide a valid email address.", null, 400);
}

if ($password !== $confirm_password) {
    sendResponse("error", "Passwords do not match.", null, 400);
}

if (strlen($password) < 6) {
    sendResponse("error", "Password must be at least 6 characters long.", null, 400);
}

if (strlen($username) < 3 || strlen($username) > 30) {
    sendResponse("error", "Username must be between 3 and 30 characters.", null, 400);
}

// Check if username or email already exists
try {
    $stmt = $pdo->prepare("SELECT id, username, email FROM users WHERE username = ? OR email = ?");
    $stmt->execute([$username, $email]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        if (strcasecmp($existingUser['username'], $username) === 0) {
            sendResponse("error", "Username is already taken.", null, 400);
        }
        if (strcasecmp($existingUser['email'], $email) === 0) {
            sendResponse("error", "Email is already registered.", null, 400);
        }
    }

    // Hash the password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $password_hash]);

    sendResponse("success", "Registration successful. You can now log in.", null, 201);

} catch (PDOException $e) {
    sendResponse("error", "Database error: " . $e->getMessage(), null, 500);
}
