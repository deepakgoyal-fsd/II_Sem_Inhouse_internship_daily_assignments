<?php
$error = "";
$name = "";
$email = "";
$password = "";
$confirmPassword = "";

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"] ?? "");
    $email = mysqli_real_escape_string($conn, $_POST["email"] ?? "");
    $password = mysqli_real_escape_string($conn, $_POST["password"] ?? "");
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"] ?? "");

    if ($name == "" || $email == "" || $password == "" || $confirmPassword == "") {
        $error = "All fields are required.";
        echo $error;
    } elseif ($password != $confirmPassword) {
        $error = "Password does not match.";
        echo $error;
    } else {
        $insertQuery = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$password', 'user')";
        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            header("Location: success.php");
            exit();
        } else {
            echo "Error occurred while storing data";
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>                                                                                                 