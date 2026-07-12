<?php
require_once 'config/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$id = (int) ($_POST['id'] ?? 0);

if ($id <= 0) {
    header('Location: index.php?status_msg=error');
    exit;
}

// Look up the photo first so we can clean up the uploaded file too
$photo = null;
$lookupStmt = mysqli_prepare($conn, 'SELECT photo FROM students WHERE id = ?');
mysqli_stmt_bind_param($lookupStmt, 'i', $id);
mysqli_stmt_execute($lookupStmt);
$lookupResult = mysqli_stmt_get_result($lookupStmt);
if ($row = mysqli_fetch_assoc($lookupResult)) {
    $photo = $row['photo'];
}
mysqli_stmt_close($lookupStmt);

$deleteStmt = mysqli_prepare($conn, 'DELETE FROM students WHERE id = ?');
mysqli_stmt_bind_param($deleteStmt, 'i', $id);

if (mysqli_stmt_execute($deleteStmt)) {
    mysqli_stmt_close($deleteStmt);

    if ($photo && file_exists(__DIR__ . '/assets/uploads/' . $photo)) {
        unlink(__DIR__ . '/assets/uploads/' . $photo);
    }

    header('Location: index.php?status_msg=deleted');
    exit;
} else {
    error_log('Delete failed: ' . mysqli_error($conn));
    mysqli_stmt_close($deleteStmt);
    header('Location: index.php?status_msg=error');
    exit;
}
