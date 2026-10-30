<?php

$error = "";

$name ="";
$email ="";
$password ="";
$confirmPassword ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);

    if (
        empty($name) ||
        empty($email) ||
        empty($password) ||
        empty($confirmPassword)
    ) {

        echo "<div class='alert alert-danger'>All fields are required.</div>";

    } elseif ($password != $confirmPassword) {

        echo "<div class='alert alert-danger'>Passwords do not match.</div>";

    } else {

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user(name,email,password)
                VALUES('$name','$email','$password')";

        if(mysqli_query($conn,$sql))
        {
            header("Location: success.php");
            exit();
        }
        else
        {
            echo "<div class='alert alert-danger'>Database Error : ".mysqli_error($conn)."</div>";
        }

    }

}
?>