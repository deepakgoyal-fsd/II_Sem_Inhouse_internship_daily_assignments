<?php

$error = "";

$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    if ($email == "" || $password == "") {

        $error = "All fields are required.";
        echo $error;

    } else {

        $selectQuery = "SELECT * FROM user WHERE Email='$email' AND Password='$password'";

        $result = mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        if ($user) {

            session_start();

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['Name'];
            $_SESSION['user_email'] = $user['Email'];

            header("Location: dashboard.php");
            exit();

        } else {

            echo "Invalid Credentials";
            echo mysqli_error($conn);

        }

    }

}
?>