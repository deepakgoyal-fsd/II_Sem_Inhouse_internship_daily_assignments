<?php
include "../common/db_connect.php";

$id = $_POST['id'];
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$college = trim($_POST['college']);
$branch = trim($_POST['branch']);

$stmt = mysqli_prepare($conn, "UPDATE students SET name=?, email=?, college=?, branch=? WHERE id=?");
mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $college, $branch, $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("Location: students.php?msg=updated");
exit;
