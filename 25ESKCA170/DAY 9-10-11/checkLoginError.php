<?php
$error = "";
$email = "";
$password = "";

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once("roles.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST["email"] ?? "");
    $password = mysqli_real_escape_string($conn, $_POST["password"] ?? "");

    if ($email == "" || $password == "") {
        $error = "All fields are required.";
        echo $error;
    } else {
        $selectQuery = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
        $result = mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];
            $_SESSION["user_email"] = $user["email"];
            $_SESSION["user_role"] = normalizeRole($user["role"] ?? ROLE_USER);

            if (isHeadAdmin($_SESSION["user_role"])) {
                header("Location: headAdminDashboard.php");
            } else {
                header("Location: dashboard.php");
            }
            exit();
        } else {
            echo "Invalid Credentials";
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>