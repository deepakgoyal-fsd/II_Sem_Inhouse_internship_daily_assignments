<?php
$error = "";

$name = "";
$email ="";
$password ="";
$confirmpassword ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, trim($_POST["name"]));
    $email = mysqli_real_escape_string($conn, trim($_POST["email"]));
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmpassword = mysqli_real_escape_string($conn, $_POST["confirmpassword"]);

    if ($name == "" || $email == "" || $password == "" || $confirmpassword == "") {
        $error = "All fields are required.";
        echo $error;
    } elseif ($password !== $confirmpassword) {
        $error = "Password does not match.";
        echo $error;
    } else {
        // hash password before storing
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        // insert (use escaped values)
        $insertQuery = "INSERT INTO user(name, email, password) VALUES('$name', '$email', '$hashed')";

        $result = mysqli_query($conn, $insertQuery);

        if ($result) {
            header("Location: succes.php");
            exit();
        } else {
            echo "Error occurred while storing data";
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>