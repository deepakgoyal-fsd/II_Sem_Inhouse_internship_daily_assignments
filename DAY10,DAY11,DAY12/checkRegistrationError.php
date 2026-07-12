<?php

$error = "";

$name = "";
$email = "";
$password = "";
$confirmPassword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);

    if (empty($name)) {
        $error .= "Name is required.<br>";
    }

    if (empty($email)) {
        $error .= "Email is required.<br>";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= "Invalid Email Format.<br>";
    }

    if (empty($password)) {
        $error .= "Password is required.<br>";
    }

    if ($password != $confirmPassword) {
        $error .= "Password and Confirm Password do not match.<br>";
    }

    if ($error == "") {

        $insertQuery = "INSERT INTO user(name, email, password)
                        VALUES('$name', '$email', '$password')";

        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            header("Location: success.php");
            exit();
        } else {
            echo "Error occurred while storing data.<br>";
            echo "Error: " . mysqli_error($conn);
        }

    } else {
        echo $error;
    }

}
?>