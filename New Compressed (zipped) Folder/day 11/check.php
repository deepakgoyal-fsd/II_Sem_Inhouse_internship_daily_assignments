<?php

session_start();

$entered_password = $_POST['pass'];


if ($entered_password == "skit123") {
  
    $_SESSION['admin_logged_in'] = true;
    

    header("Location: dashboard.php");
} else {

    echo "<div style='font-family: Arial, sans-serif; text-align: center; padding-top: 50px;'>";
    echo "<h3 style='color: red;'>Access Denied: Incorrect Security Key!</h3>";
    echo "<a href='login.html'>Return to Login Screen</a>";
    echo "</div>";
}
?>