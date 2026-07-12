<?php
include "../common/db_connect.php";

$name = trim($_POST['name']);
$email = trim($_POST['email']);
$college = trim($_POST['college']);
$branch = trim($_POST['branch']);

$stmt = mysqli_prepare($conn, "INSERT INTO students (name, email, college, branch) VALUES (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $college, $branch);

if (mysqli_stmt_execute($stmt)) {
    header("Location: students.php?msg=added");
} else {
    header("Location: add_student.php?error=1");
}

mysqli_stmt_close($stmt);
exit;
