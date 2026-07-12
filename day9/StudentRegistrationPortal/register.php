<?php
require_once 'config/db_connect.php';

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

function h($value) {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

$name    = trim($_POST['name'] ?? '');
$email   = trim($_POST['email'] ?? '');
$cgpa    = trim($_POST['cgpa'] ?? '');
$branch  = trim($_POST['branch'] ?? '');
$college = trim($_POST['college'] ?? '');
$course  = trim($_POST['course'] ?? '');
$address = trim($_POST['address'] ?? '');
$photo   = trim($_POST['photo_filename'] ?? ''); // filename only, no upload handling required

$errors = [];

if ($name === '') {
    $errors[] = 'Name is required.';
}
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'A valid email is required.';
}
if ($cgpa === '' || !is_numeric($cgpa) || $cgpa < 0 || $cgpa > 10) {
    $errors[] = 'CGPA must be a number between 0 and 10.';
}
if ($branch === '') {
    $errors[] = 'Branch is required.';
}
if ($college === '') {
    $errors[] = 'College is required.';
}

if (!empty($errors)) {
    $errorMessage = implode(' ', $errors);
    header('Location: index.php?status=error&msg=' . urlencode($errorMessage));
    exit;
}

// Duplicate email prevention — check before inserting
$checkStmt = mysqli_prepare($conn, 'SELECT id FROM students WHERE email = ?');
mysqli_stmt_bind_param($checkStmt, 's', $email);
mysqli_stmt_execute($checkStmt);
mysqli_stmt_store_result($checkStmt);

if (mysqli_stmt_num_rows($checkStmt) > 0) {
    mysqli_stmt_close($checkStmt);
    header('Location: index.php?status=duplicate&email=' . urlencode($email));
    exit;
}
mysqli_stmt_close($checkStmt);

// Insert using a prepared statement — no raw SQL, no injection risk
$insertStmt = mysqli_prepare(
    $conn,
    'INSERT INTO students (name, email, cgpa, branch, college, course, address, photo)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?)'
);

mysqli_stmt_bind_param(
    $insertStmt,
    'ssdsssss',
    $name, $email, $cgpa, $branch, $college, $course, $address, $photo
);

if (mysqli_stmt_execute($insertStmt)) {
    mysqli_stmt_close($insertStmt);
    header('Location: index.php?status=success');
    exit;
} else {
    error_log('Insert failed: ' . mysqli_error($conn));
    mysqli_stmt_close($insertStmt);
    header('Location: index.php?status=error&msg=' . urlencode('Something went wrong while saving. Please try again.'));
    exit;
}
