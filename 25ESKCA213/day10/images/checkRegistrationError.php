<?php
include ("db_connect.php");

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
        echo $error;

    } else {

        // Password validations
        if ($password != $confirmPassword) {
            $error .= "• Passwords do not match.<br>";
        }

        if (strlen($password) < 8) {
            $error .= "• Password must be at least 8 characters.<br>";
        }

        if (!preg_match("/[A-Z]/", $password)) {
            $error .= "• Password must contain at least one uppercase letter.<br>";
        }

        if (!preg_match("/[a-z]/", $password)) {
            $error .= "• Password must contain at least one lowercase letter.<br>";
        }

        if (!preg_match("/[0-9]/", $password)) {
            $error .= "• Password must contain at least one number.<br>";
        }

        if (!preg_match("/[@$!%*?&]/", $password)) {
            $error .= "• Password must contain at least one special character.<br>";
        }

        if ($error != "") {

            echo $error;

        } else {

            // Hash password before storing
            $password = password_hash($password, PASSWORD_DEFAULT);

            // Insert
            $insertQuery = "INSERT INTO user(name, email, password)
                            VALUES('$name', '$email', '$password')";

            $result = mysqli_query($conn, $insertQuery);

            if ($result) {
                header("Location: success.php");
                exit();
            } else {
                echo "Error occurred while storing data.<br>";
                echo mysqli_error($conn);
            }
        }
    }
}
?>