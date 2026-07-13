<?php
include("header.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $gender = $_POST["gender"];
    $city = $_POST["city"];
    $address = trim($_POST["address"]);
    $terms = isset($_POST["terms"]);
    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors[] = "Name should contain only letters and spaces.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    if (empty($phone)) {
        $errors[] = "Phone number is required.";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Phone number must contain exactly 10 digits.";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters.";
    }

    if ($password != $confirm_password) {
        $errors[] = "Passwords do not match.";
    }
    if (empty($gender)) {
        $errors[] = "Please select your gender.";
    }
    if (empty($city)) {
        $errors[] = "Please select a city.";
    }
    if (empty($address)) {
        $errors[] = "Address cannot be empty.";
    }
    if (!$terms) {
        $errors[] = "You must accept the Terms & Conditions.";
    }
    if (!empty($errors)) {
        echo '<div class="container mt-5">';
        echo '<div class="alert alert-danger">';
        echo '<h4>Registration Failed</h4>';
        echo '<ul>';
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo '</ul>';
        echo '<a href="index.php" class="btn btn-danger">Go Back</a>';
        echo '</div>';
        echo '</div>';
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        echo '<div class="container mt-5">';
        echo '<div class="card shadow">';
        echo '<div class="card-header bg-success text-white">';
        echo '<h3 class="text-center">Registration Successful</h3>';
        echo '</div>';
        echo '<div class="card-body">';
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email:</strong> $email</p>";
        echo "<p><strong>Phone:</strong> $phone</p>";
        echo "<p><strong>Gender:</strong> $gender</p>";
        echo "<p><strong>City:</strong> $city</p>";
        echo "<p><strong>Address:</strong> $address</p>";
        echo "<p><strong>Encrypted Password:</strong><br>$hashedPassword</p>";
        echo '<a href="index.php" class="btn btn-success mt-3">Register Another Student</a>';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
} else {
    echo '<div class="container mt-5">';
    echo '<div class="alert alert-warning">';
    echo '<h4>Invalid Request!</h4>';
    echo '<p>Please submit the form from the Registration Page.</p>';
    echo '<a href="index.php" class="btn btn-warning">Go to Registration Form</a>';
    echo '</div>';
    echo '</div>';
}
include("footer.php");
?>