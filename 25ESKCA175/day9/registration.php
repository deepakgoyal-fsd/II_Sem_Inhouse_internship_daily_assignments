<?php
include 'dc_connect.php';

$name = $_POST["name"];
$branch = $_POST["branch"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$cgpa = $_POST["cgpa"];

if(empty($name)){
    echo "Name is empty <br>";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    echo "email is invalid";
}

if(!is_numeric($phone)){
    echo "invalid phone number";
} 

$errors = [];
if (empty($_POST['name'])) {
$errors[] = "Name is required.";
}
if (!filter_var($_POST['email'],
FILTER_VALIDATE_EMAIL)) {
$errors[] = "Invalid email address.";
}
if (count($errors) > 0) {
// Show errors
} else {
// Process data
}

$success = "";

if ($name === '') {
    // (name validation, content unclear)
}

// Email: required only
if ($email === '') {
    $errors['email'] = 'Email is required.';
    echo "Email is required.";
}

if (empty($errors)) {
    $success = 'Form submitted successfully.';

    $sql = "INSERT INTO student (name, email, phone, branch, cgpa)
VALUES ('$name', '$email', '$phone', '$branch', '$cgpa')";
    // (query string cut off on right edge)

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

echo "Values received : <br> $name <br> $branch <br> $email <br> $phone ";
?>