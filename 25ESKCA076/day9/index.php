<?php
// include("try.php");

$name = $_POST["name"];
$branch = $_POST["branch"];
$email = $_POST["email"];
$cgpa = $_POST["cgpa"];
$phoneNumber = $_POST["phoneNumber"];
$roll_no = $_POST["roll_no"];

$errors = [];

if (empty($name)) {
    $errors[] = "Name is required.";
}

if (empty($email)) {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address.";
}

if (empty($phoneNumber)) {
    $errors[] = "Phone number is required.";
} elseif (!is_numeric($phoneNumber)) {
    $errors[] = "Phone number must contain only digits.";
}

if (empty($cgpa)) {
    $errors[] = "CGPA is required.";
}

if (empty($branch)) {
    $errors[] = "Branch is required.";
}

if (empty($roll_no)) {
    $errors[] = "Roll number is required.";
}

if (!empty($errors)) {
    echo "<h3>Please fix the following errors:</h3>";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>" . $error . "</li>";
    }
    echo "</ul>";
    exit; 
}

echo "Form submitted successfully!<br><br>";
echo "Values received : <br>";
echo "Name: $name <br>";
echo "Branch: $branch <br>";
echo "Email: $email <br>";
echo "Phone: $phoneNumber <br>";
echo "CGPA: $cgpa <br>";
echo "Roll No: $roll_no <br>";

?> 
