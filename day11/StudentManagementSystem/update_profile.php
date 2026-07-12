<?php
require_once 'includes/require_login.php';
require_once 'config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: profile.php');
    exit;
}

$name  = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$id    = (int) $_SESSION['user_id'];

if ($name === '' || $email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header('Location: profile.php?status_msg=error');
    exit;
}

// Duplicate email check (excluding this user's own row)
$checkStmt = mysqli_prepare($conn, 'SELECT id FROM users WHERE email = ? AND id <> ?');
mysqli_stmt_bind_param($checkStmt, 'si', $email, $id);
mysqli_stmt_execute($checkStmt);
mysqli_stmt_store_result($checkStmt);
if (mysqli_stmt_num_rows($checkStmt) > 0) {
    mysqli_stmt_close($checkStmt);
    header('Location: profile.php?status_msg=error');
    exit;
}
mysqli_stmt_close($checkStmt);

// ---------- Handle optional new profile picture ----------
$photoFilename = null;
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
    if (in_array($ext, $allowedExt, true)) {
        $uploadDir = __DIR__ . '/assets/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $photoFilename = 'user_' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $photoFilename);
    }
}

if ($photoFilename !== null) {
    $stmt = mysqli_prepare($conn, 'UPDATE users SET name = ?, email = ?, profile_picture = ? WHERE id = ?');
    mysqli_stmt_bind_param($stmt, 'sssi', $name, $email, $photoFilename, $id);
} else {
    $stmt = mysqli_prepare($conn, 'UPDATE users SET name = ?, email = ? WHERE id = ?');
    mysqli_stmt_bind_param($stmt, 'ssi', $name, $email, $id);
}

if (mysqli_stmt_execute($stmt)) {
    mysqli_stmt_close($stmt);

    // Keep the session in sync with the freshly saved values
    $_SESSION['user_name']  = $name;
    $_SESSION['user_email'] = $email;
    if ($photoFilename !== null) {
        $_SESSION['user_picture'] = $photoFilename;
    }

    header('Location: profile.php?status_msg=updated');
    exit;
} else {
    error_log('Profile update failed: ' . mysqli_error($conn));
    mysqli_stmt_close($stmt);
    header('Location: profile.php?status_msg=error');
    exit;
}
