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

    if ($name == "" || $email == "" || $password == "" || $confirmPassword == "") {

        $error = "All fields are required.";
        echo "<div class='alert alert-danger'>$error</div>";

    } elseif ($password != $confirmPassword) {

        $error = "Passwords do not match.";
        echo "<div class='alert alert-danger'>$error</div>";

    } else {

        $insertQuery = "INSERT INTO user (name, email, password)
                        VALUES ('$name', '$email', '$password')";

        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            header("Location: success.php");
            exit();
        } else {
            echo "<div class='alert alert-danger'>";
            echo "Error occurred while storing data.<br>";
            echo mysqli_error($conn);
            echo "</div>";
        }
    }
}

?>