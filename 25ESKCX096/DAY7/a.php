<?php
// Initialize an empty array for errors
$errors = [];
$success_message = "";

// Initialize sticky input variables
$email = "";
$phone = "";

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and grab inputs safely
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    
    // 1. Email Validation using filter_var
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // 2. Phone Validation using strlen() and is_numeric()
    if (strlen($phone) !== 10 || !is_numeric($phone)) {
        $errors[] = "Phone number must be exactly 10 digits and contain no letters.";
    }

    // 3. Success State Check
    if (empty($errors)) {
        $success_message = "Success! Your form has been validated and submitted.";
        // Reset fields after successful submission
        $email = "";
        $phone = "";
    }
}
?>