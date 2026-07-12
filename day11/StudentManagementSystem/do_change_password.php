<?php
require_once 'includes/require_login.php';
require_once 'config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: change_password.php');
    exit;
}

$id              = (int) $_SESSION['user_id'];
$currentPassword = $_POST['current_password'] ?? '';
$newPassword     = $_POST['new_password'] ?? '';
$confirmPassword = $_POST['confirm_password'] ?? '';

if ($currentPassword === '' || $newPassword === '' || $confirmPassword === '') {
    header('Location: change_password.php?status_msg=error');
    exit;
}

if (strlen($newPassword) < 8) {
    header('Location: change_password.php?status_msg=error');
    exit;
}

if ($newPassword !== $confirmPassword) {
    header('Location: change_password.php?status_msg=mismatch');
    exit;
}

// Fetch the current hash to verify the current password
$stmt = mysqli_prepare($conn, 'SELECT password FROM users WHERE id = ?');
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$user || !password_verify($currentPassword, $user['password'])) {
    header('Location: change_password.php?status_msg=wrong_current');
    exit;
}

$newHash = password_hash($newPassword, PASSWORD_BCRYPT);

$updateStmt = mysqli_prepare($conn, 'UPDATE users SET password = ? WHERE id = ?');
mysqli_stmt_bind_param($updateStmt, 'si', $newHash, $id);

if (mysqli_stmt_execute($updateStmt)) {
    mysqli_stmt_close($updateStmt);
    header('Location: change_password.php?status_msg=updated');
    exit;
} else {
    error_log('Password change failed: ' . mysqli_error($conn));
    mysqli_stmt_close($updateStmt);
    header('Location: change_password.php?status_msg=error');
    exit;
}
