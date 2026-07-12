<?php
// same issue as demo6 - swapped the raw $email into the query for a
// prepared statement so it can't be used to inject SQL.

$emailToCheck = trim($_POST['email'] ?? '');

$stmt = mysqli_prepare($conn, "SELECT * FROM students WHERE email = ?");
mysqli_stmt_bind_param($stmt, "s", $emailToCheck);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    echo "That email is already registered";
} else {
    echo "Email is free to use";
}

mysqli_stmt_close($stmt);
?>
