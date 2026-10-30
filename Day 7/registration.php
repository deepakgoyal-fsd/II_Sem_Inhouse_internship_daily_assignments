<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);

    if (empty($name) || empty($email) || empty($phone)) {
        echo "<h2 style='color:red;'>Error: All fields are required.</h2>";
    }
    else {
        echo "<h2 style='color:green;'>Registration Successful!</h2>";
        echo "Name: " . htmlspecialchars($name) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Phone: " . htmlspecialchars($phone) . "<br>";
    }

} else {
    echo "<h2 style='color:red;'>Invalid Request!</h2>";
}

?>