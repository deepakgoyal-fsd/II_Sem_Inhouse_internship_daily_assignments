<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
include("db_connect.php");
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $query = "DELETE FROM students WHERE id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    if(mysqli_stmt_execute($stmt))
    {
        header("Location: students.php");
        exit();
    }
    else
    {
        echo "Error: " . mysqli_error($conn);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
else
{
    header("Location: students.php");
    exit();
}
?>