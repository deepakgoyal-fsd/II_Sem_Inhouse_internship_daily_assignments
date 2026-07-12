<?php
session_start();

$error = "";

$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if (empty($email) || empty($password)) {

        $error = "All fields are required.";
        echo "<div class='alert alert-danger'>$error</div>";

    } else {

        $selectQuery = "SELECT * FROM user WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $selectQuery);

        if (mysqli_num_rows($result) > 0) {

            $user = mysqli_fetch_assoc($result);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['email'] = $user['email'];

            header("Location: dashboard.php");
            exit();

        } else {

            $error = "Invalid Credentials.";
            echo "<div class='alert alert-danger'>$error</div>";

        }
    }
}
?>