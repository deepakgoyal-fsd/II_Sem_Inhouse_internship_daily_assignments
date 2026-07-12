<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == "" || $password == "") {
        $error = "All fields are required.";
        echo $error;
    } else {

        // Login check
        $selectQuery = "SELECT * FROM user WHERE email='$email' AND password='$password'";

        $result = mysqli_query($conn, $selectQuery);
        $user = mysqli_fetch_assoc($result);

        if ($user) {

        //After successful login:

        session_start();

        $_SESSION['user_id'] =$user['id'];
        $_SESSION['user_name'] =$user['name'];
        $_SESSION['user_email'] =$user['email'];


            header("Location: dashboard.php");
            exit();
        } else {

            echo "Invalid Credentials";

            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
