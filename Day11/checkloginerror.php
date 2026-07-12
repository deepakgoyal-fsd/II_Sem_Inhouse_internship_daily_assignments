<?php

session_start();
include("db_connect.php");
$error = "";

$email = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Check if fields are empty
    if ($email == "" || $password == "") {

        $error = "All fields are required.";
        echo $error;

    } else {

        // Check user credentials
        $selectQuery = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";

        $result = mysqli_query($conn, $selectQuery);

        if ($result && mysqli_num_rows($result) > 0) {

            $user = mysqli_fetch_assoc($result);

            // Store user data in session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];

            // Redirect to dashboard
            header("Location: dashboardday11.php");
            exit();

        } else {

            echo "Invalid Credentials";

            if (!$result) {
                echo "<br>Error: " . mysqli_error($conn);
            }
        }
    }
}

?>
