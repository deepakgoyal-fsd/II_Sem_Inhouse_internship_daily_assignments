<?php
require_once 'config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id      = (int) ($_POST['id'] ?? 0);
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

if ($id <= 0) $errors[] = 'Invalid student.';
if ($name === '') $errors[] = 'Name is required.';
if ($email === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'A valid email is required.';
if ($cgpa === '' || !is_numeric($cgpa) || $cgpa < 0 || $cgpa > 10) $errors[] = 'CGPA must be between 0.0 and 10.0.';
if ($branch === '') $errors[] = 'Branch is required.';
if ($college === '') $errors[] = 'College is required.';

if (!empty($errors)) {
    header('Location: edit_student.php?id=' . $id . '&status_msg=error');
    exit;
}

// Duplicate email check (excluding this student's own row)
$checkStmt = mysqli_prepare($conn, 'SELECT id FROM students WHERE email = ? AND id <> ?');
mysqli_stmt_bind_param($checkStmt, 'si', $email, $id);
mysqli_stmt_execute($checkStmt);
mysqli_stmt_store_result($checkStmt);
if (mysqli_stmt_num_rows($checkStmt) > 0) {
    mysqli_stmt_close($checkStmt);
    header('Location: edit_student.php?id=' . $id . '&status_msg=duplicate');
    exit;
}
mysqli_stmt_close($checkStmt);

// ---------- Handle optional new photo upload ----------
$photoUpdateSql = '';
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

// ---------- Run the UPDATE using a prepared statement ----------
if ($photoFilename !== null) {
    $updateStmt = mysqli_prepare(
        $conn,
        'UPDATE students
         SET name = ?, email = ?, cgpa = ?, branch = ?, college = ?, course = ?, address = ?, status = ?, photo = ?
         WHERE id = ?'
    );
    mysqli_stmt_bind_param(
        $updateStmt,
        'ssdssssssi',
        $name, $email, $cgpa, $branch, $college, $course, $address, $status, $photoFilename, $id
    );
} else {
    $updateStmt = mysqli_prepare(
        $conn,
        'UPDATE students
         SET name = ?, email = ?, cgpa = ?, branch = ?, college = ?, course = ?, address = ?, status = ?
         WHERE id = ?'
    );
    mysqli_stmt_bind_param(
        $updateStmt,
        'ssdssssi',
        $name, $email, $cgpa, $branch, $college, $course, $address, $status, $id
    );
}

if (mysqli_stmt_execute($updateStmt)) {
    mysqli_stmt_close($updateStmt);
    header('Location: index.php?status_msg=updated');
    exit;
} else {
    error_log('Update failed: ' . mysqli_error($conn));
    mysqli_stmt_close($updateStmt);
    header('Location: edit_student.php?id=' . $id . '&status_msg=error');
    exit;
}
