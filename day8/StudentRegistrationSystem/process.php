<?php
session_start();
require_once 'includes/functions.php';

// Only accept POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$data = [
    'name'    => trim($_POST['name'] ?? ''),
    'email'   => trim($_POST['email'] ?? ''),
    'cgpa'    => trim($_POST['cgpa'] ?? ''),
    'branch'  => trim($_POST['branch'] ?? ''),
    'college' => trim($_POST['college'] ?? ''),
    'gender'  => trim($_POST['gender'] ?? ''),
    'course'  => trim($_POST['course'] ?? ''),
    'address' => trim($_POST['address'] ?? ''),
];

$errors = validateRegistration($data);

if (!empty($errors)) {
    // Redirect back to the form (Post/Redirect/Get) with errors + old input
    $_SESSION['errors'] = $errors;
    $_SESSION['old_input'] = $data;
    header('Location: index.php');
    exit;
}

// Success — store the submission and redirect to the confirmation page
$_SESSION['registration'] = $data;
$_SESSION['submitted_at'] = date('F j, Y \a\t g:i A');

header('Location: confirmation.php');
exit;
