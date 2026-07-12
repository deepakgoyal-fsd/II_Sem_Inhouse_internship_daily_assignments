<?php
session_start();
include("db_connect.php");
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $college = trim($_POST['college']);
    $branch = trim($_POST['branch']);
    $check = "SELECT id FROM students WHERE email = ? AND id != ?";
    $stmt = mysqli_prepare($conn, $check);
    mysqli_stmt_bind_param($stmt, "si", $email, $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result) > 0)
    {
        echo "<script>
                alert('Email already exists');
                window.location='edit_student.php?id=$id';
              </script>";
        exit();
    }
    if(!empty($password))
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE students
                  SET name=?, email=?, password=?, college=?, branch=?, updated_at=NOW()
                  WHERE id=?";

        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param(
            $stmt,
            "sssssi",
            $name,
            $email,
            $hashed_password,
            $college,
            $branch,
            $id
        );
    }
    else
    {
        $query = "UPDATE students
                  SET name=?, email=?, college=?, branch=?, updated_at=NOW()
                  WHERE id=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param(
            $stmt,
            "ssssi",
            $name,
            $email,
            $college,
            $branch,
            $id
        );
    }
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