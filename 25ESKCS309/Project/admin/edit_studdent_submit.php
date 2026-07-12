<?php include "../common/db_connect.php";

$name = $_POST['name'];
$email = $_POST['email'];
$college = $_POST['college'];
$branch = $_POST['branch'];
$id = $_POST['id_hidden'];

$stmt = mysqli_prepare($conn, "UPDATE students SET name = ?, email = ?, college = ?, branch = ? WHERE id = ?");
mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $college, $branch, $id);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

header("Location: students.php");
exit;
