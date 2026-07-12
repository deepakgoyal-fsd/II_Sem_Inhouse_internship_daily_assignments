<?php
session_start();
include("db-connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "<script>
                alert('Please enter Email and Password.');
                window.location='login.php';
              </script>";
        exit();
    }

    $stmt = mysqli_prepare($conn, "SELECT id, name, password FROM user WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];

            header("Location: dashboard.php");
            exit();

        } else {

            echo "<script>
                    alert('Incorrect Password.');
                    window.location='login.php';
                  </script>";
        }

    } else {

        echo "<script>
                alert('Email not registered.');
                window.location='login.php';
              </script>";
    }




    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>