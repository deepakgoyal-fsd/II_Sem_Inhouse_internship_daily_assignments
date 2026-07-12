<?php
require_once 'config/db_connect.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit;
}

$email    = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

$genericError = 'Invalid email or password.';

if ($email === '' || $password === '') {
    $_SESSION['login_error'] = $genericError;
    header('Location: login.php');
    exit;
}

// Query the database with the submitted email (Module 1, Step 3)
$stmt = mysqli_prepare($conn, 'SELECT id, name, email, password, profile_picture, last_login FROM users WHERE email = ?');
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

// Check password match (Module 1, Step 4) — never reveal whether the email or
// the password was the wrong part, to avoid leaking which emails are registered
if (!$user || !password_verify($password, $user['password'])) {
    $_SESSION['login_error'] = $genericError;
    header('Location: login.php');
    exit;
}

// ---------- Success: start the session (Module 3, Mission 3) ----------
session_regenerate_id(true); // prevent session fixation on login

$_SESSION['user_id']      = $user['id'];
$_SESSION['user_name']    = $user['name'];
$_SESSION['user_email']   = $user['email'];
$_SESSION['user_picture'] = $user['profile_picture'];

// Format the *previous* last_login for display before we overwrite it
$_SESSION['last_login'] = $user['last_login']
    ? date('M j, Y g:i A', strtotime($user['last_login']))
    : 'First login';

$_SESSION['session_started_at'] = date('g:i A');

// Store this login's timestamp for next time (Module 2 Bonus)
$updateStmt = mysqli_prepare($conn, 'UPDATE users SET last_login = NOW() WHERE id = ?');
mysqli_stmt_bind_param($updateStmt, 'i', $user['id']);
mysqli_stmt_execute($updateStmt);
mysqli_stmt_close($updateStmt);

header('Location: dashboard.php');
exit;
