<?php
require_once 'includes/require_login.php';
require_once 'config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$cgpa    = trim($_POST['cgpa'] ?? '');
$branch  = trim($_POST['branch'] ?? '');
$college = trim($_POST['college'] ?? '');
$course  = trim($_POST['course'] ?? '');
$address = trim($_POST['address'] ?? '');
$statusInput = trim($_POST['status'] ?? 'Active');
$status  = in_array($statusInput, ['Active', 'Inactive'], true) ? $statusInput : 'Active';

$errors = [];

if ($name === '') $errors[] = 'Name is required.';
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email is required.';
if ($cgpa === '' || !is_numeric($cgpa) || $cgpa < 0 || $cgpa > 10) $errors[] = 'CGPA must be a number between 0.0 and 10.0.';
if ($branch === '') $errors[] = 'Branch is required.';
if ($college === '') $errors[] = 'College is required.';

if (!empty($errors)) {
    header('Location: index.php?status_msg=error');
    exit;
}

// Duplicate email prevention
$checkStmt = mysqli_prepare($conn, 'SELECT id FROM students WHERE email = ?');
mysqli_stmt_bind_param($checkStmt, 's', $email);
mysqli_stmt_execute($checkStmt);
mysqli_stmt_store_result($checkStmt);
if (mysqli_stmt_num_rows($checkStmt) > 0) {
    mysqli_stmt_close($checkStmt);
    header('Location: index.php?status_msg=duplicate');
    exit;
}
mysqli_stmt_close($checkStmt);

// ---------- Handle photo upload (Profile Photo Upload bonus) ----------
$photoFilename = null;
if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
    $allowedExt = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $ext = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));

    if (in_array($ext, $allowedExt, true)) {
        $uploadDir = __DIR__ . '/assets/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        $photoFilename = 'student_' . uniqid() . '.' . $ext;
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadDir . $photoFilename);
    }
}

// ---------- Insert via prepared statement ----------
$insertStmt = mysqli_prepare(
    $conn,
    'INSERT INTO students (name, email, cgpa, branch, college, course, address, photo, status)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)'
);
mysqli_stmt_bind_param(
    $insertStmt,
    'ssdssssss',
    $name, $email, $cgpa, $branch, $college, $course, $address, $photoFilename, $status
);

if (mysqli_stmt_execute($insertStmt)) {
    mysqli_stmt_close($insertStmt);
    header('Location: index.php?status_msg=created');
    exit;
} else {
    error_log('Insert failed: ' . mysqli_error($conn));
    mysqli_stmt_close($insertStmt);
    header('Location: index.php?status_msg=error');
    exit;
}
