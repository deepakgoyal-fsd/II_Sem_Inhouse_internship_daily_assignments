<?php
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST["name"]);   //mysqli_real_escape_string isliye use kari h taki SQL injection se bach sake
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);

    if ($name == "" || $email == "" || $password == "" || $confirmPassword == "") {
        $error = "All fields are required";
        echo $error;

    } elseif ($password != $confirmPassword) {
        $error = "Password Does not match";
        echo $error;

    }elseif (strlen($password) <= 8) {
        $error = "Password must be more than 8 digits";
        echo $error;

    } else{
        // inserting query
        $insertQuery = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";

        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            header("Location: success.php");
            exit();
        } else {
            echo "error occurred while storing data";
            echo "Error : " . mysqli_error($conn);
        }
    }
}
?>