<?php
include_once("db_connect.php");

$error = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if ($email == "" || $password == "") {
        $error = "All fields are required.";
    } else {
        $selectQuery = "SELECT * FROM user WHERE email = ?";
        $stmt = mysqli_prepare($conn, $selectQuery);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_id']   = $user['id'];
            header("Location: dashboard.php");
            exit();
        } else {
            $error = "Invalid credentials.";
        }
    }
}
?>