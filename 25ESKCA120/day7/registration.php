<?php

$Fullname   = $_POST['Fullname'];
$email  = $_POST['email'];
$branch = $_POST['branch'];
$phoneNumber  = $_POST['phoneNumber'];

$errors = [];
$success = "";

// Name required
if ($Fullname == "") {
    $errors['Fullname'] = "Name is required.";
}

// Email required
if ($email == "") {
    $errors['email'] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Invalid email format.";
}

// Phone required
if ($phoneNumber == "") {
    $errors['phoneNumber'] = "Phone is required.";
} elseif (!preg_match("/^[0-9]{10}$/", $phoneNumber)) {
    $errors['phoneNumber'] = "Phone must be 10 digits.";
}

if ($branch == "") {
    $errors['branch'] = "Branch is required.";
}

// If no errors
if (count($errors) == 0) {
    $success = "Registration Successful!";
    echo "<h2 style='color:green;'>$success</h2>";
} else {

    echo "<h2 style='color:red;'>Validation Errors</h2>";

    foreach ($errors as $key => $value) {
        echo $value . "<br>";
    }
}

?>