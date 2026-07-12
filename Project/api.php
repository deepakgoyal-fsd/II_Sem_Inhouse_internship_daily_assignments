<?php
error_reporting(E_ALL);
ini_set('display_errors', 0);

require_once 'config.php';

header('Content-Type: application/json');

$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS);

if ($mysqli->connect_error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

$mysqli->select_db(DB_NAME);
if ($mysqli->error) {
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Database selection failed']);
    exit;
}

$mysqli->set_charset('utf8mb4');

$action = $_POST['action'] ?? $_GET['action'] ?? '';

if ($action === 'register') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($name === '' || $email === '' || $password === '') {
        echo json_encode(['success' => false, 'message' => 'All fields are required']);
        exit;
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $mysqli->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
    $stmt->bind_param('sss', $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Registration successful']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Email already exists']);
    }
    exit;
}

if ($action === 'login') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($email === '' || $password === '') {
        echo json_encode(['success' => false, 'message' => 'Email and password are required']);
        exit;
    }

    $stmt = $mysqli->prepare('SELECT id, name, password FROM users WHERE email = ?');
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        echo json_encode(['success' => true, 'message' => 'Login successful', 'name' => $user['name']]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid credentials']);
    }
    exit;
}

if ($action === 'feedback') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $category = trim($_POST['category'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $rating = intval($_POST['rating'] ?? 0);
    $learningMark = trim($_POST['learningMark'] ?? '');

    if ($name === '' || $email === '' || $category === '' || $subject === '' || $message === '' || $rating < 1 || $rating > 5 || $learningMark === '') {
        echo json_encode(['success' => false, 'message' => 'Please complete all fields']);
        exit;
    }

    $stmt = $mysqli->prepare('INSERT INTO feedback (name, email, category, subject, message, rating, learning_mark) VALUES (?, ?, ?, ?, ?, ?, ?)');
    if (!$stmt) {
        echo json_encode(['success' => false, 'message' => 'Prepare failed: ' . $mysqli->error]);
        exit;
    }
    
    $stmt->bind_param('sssssis', $name, $email, $category, $subject, $message, $rating, $learningMark);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Feedback saved successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Could not save feedback: ' . $stmt->error]);
    }
    exit;
}

if ($action === 'list') {
    $result = $mysqli->query('SELECT * FROM feedback ORDER BY created_at DESC');
    if ($result) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode(['success' => true, 'feedback' => $rows]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Query failed']);
    }
    exit;
}

echo json_encode(['success' => false, 'message' => 'Invalid action']);
