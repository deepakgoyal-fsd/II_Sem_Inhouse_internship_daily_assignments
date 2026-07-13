<?php
session_start();
include("db_connect.php");
if(isset($_POST['save']))
{
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $college = trim($_POST['college']);
    $branch = trim($_POST['branch']);
    $check = "SELECT id FROM students WHERE email = ?";
    $stmt = mysqli_prepare($conn, $check);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) > 0)
    {
        echo "<script>
                alert('Email already exists');
                window.location='add_student.php';
              </script>";
        exit();
    }
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO students(name, email, password, college, branch, created_at, updated_at)
              VALUES(?, ?, ?, ?, ?, NOW(), NOW())";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $name,
        $email,
        $hashed_password,
        $college,
        $branch
    );
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
    header("Location: add_student.php");
    exit();
}
?>