<?php
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $fullname  = trim($_POST['fullname']);
    $email     = trim($_POST['email']);
    $phone     = trim($_POST['phone']);
    $collegeid = trim($_POST['collegeid']);
    $branch    = trim($_POST['branch']);
    $semester  = trim($_POST['semester']);
    $gender    = trim($_POST['gender']);
    $city      = trim($_POST['city']);
    $password  = trim($_POST['password']);

    // Validate empty fields
    if (
        empty($fullname) ||
        empty($email) ||
        empty($phone) ||
        empty($collegeid) ||
        empty($branch) ||
        empty($semester) ||
        empty($gender) ||
        empty($city) ||
        empty($password)
    ) {
        die("❌ Please fill all the fields.");
    }

    // Validate Email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("❌ Invalid Email Address.");
    }

    // Validate Phone Number
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        die("❌ Phone number must contain exactly 10 digits.");
    }

    // Store data in Session
    $_SESSION["fullname"]  = $fullname;
    $_SESSION["email"]     = $email;
    $_SESSION["phone"]     = $phone;
    $_SESSION["collegeid"] = $collegeid;
    $_SESSION["branch"]    = $branch;
    $_SESSION["semester"]  = $semester;
    $_SESSION["gender"]    = $gender;
    $_SESSION["city"]      = $city;

    // Redirect to Success Page
    header("Location: success.php");
    exit();
}
else
{
    echo "Access Denied!";
}
?>