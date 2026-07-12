<?php
// note: the original version of this built the query by pasting $_POST
// straight into the string, which lets anyone inject SQL through the
// name/email fields. Using a prepared statement instead so the values are
// bound, not concatenated.

$studentName  = trim($_POST['name'] ?? '');
$studentEmail = trim($_POST['email'] ?? '');

$stmt = mysqli_prepare($conn, "INSERT INTO students (name, email) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $studentName, $studentEmail);

if (mysqli_stmt_execute($stmt)) {
    echo "Saved!";
} else {
    echo "Could not save: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
?>
