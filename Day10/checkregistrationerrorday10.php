<?php

include("db_connect.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirm_password"]);

    if ($name == "" || $email == "" || $password == "" || $confirmPassword == "") {

        echo "All fields are required.";

    } elseif ($password != $confirmPassword) {

        echo "Passwords do not match.";

    } else {

        $insertQuery = "INSERT INTO user (name, email, password)  VALUES ('$name', '$email', '$password')";

        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            header("Location: successday10.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
