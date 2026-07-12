<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["fullname"] ?? "";
    $email = $_POST["email"] ?? "";
    $phone = $_POST["phone"] ?? "";
    $dob = $_POST["dob"] ?? "";
    $branch = $_POST["branch"] ?? "";
    $gender = $_POST["gender"] ?? "";
    $address = $_POST["address"] ?? "";
    $country = $_POST["country"] ?? "";
    $city = $_POST["city"] ?? "";
    $state = $_POST["state"] ?? "";
    $pincode = $_POST["pincode"] ?? "";
    $password = $_POST["password"] ?? "";
    $confirmPassword = $_POST["confirm_password"] ?? "";

    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "All fields are required.";
    }
    elseif (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
    }
    elseif ($password != $confirmPassword) {
        echo "Passwords do not match.";
    }
    else {
        echo "<h2>Registration Successful!</h2>";
        echo "<b>Name:</b> $name <br>";
        echo "<b>Email:</b> $email <br>";
        echo "<b>Phone:</b> $phone <br>";
        echo "<b>Date of Birth:</b> $dob <br>";
        echo "<b>Branch:</b> $branch <br>";
        echo "<b>Gender:</b> $gender <br>";
        echo "<b>Address:</b> $address <br>";
        echo "<b>Country:</b> $country <br>";
        echo "<b>City:</b> $city <br>";
        echo "<b>State:</b> $state <br>";
        echo "<b>Pin Code:</b> $pincode <br>";
    }
}

?>