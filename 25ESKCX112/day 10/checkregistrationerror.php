<?php

include 'db_connect.php'; 

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    
    if ($name == "" || $email == "" || $password == "") {
        $error = "All fields are required.";
        echo $error;
    } else {
        // Data ko 'user' table mein insert karne ki SQL query
        $sql = "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password')";

        // Query ko execute karna
        if (mysqli_query($conn, $sql)) {
            
            header("Location: success.php");
            exit();
        } else {
            
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>