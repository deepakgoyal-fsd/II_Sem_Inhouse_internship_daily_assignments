<?php
include "../common/db_connect.php";

$id = $_GET['id'] ?? null;
if ($id) {
    $stmt = mysqli_prepare($conn, "DELETE FROM contacts WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

header("Location: contacts.php");
exit;
