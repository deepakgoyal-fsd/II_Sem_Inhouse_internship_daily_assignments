<?php

$fullname = $_POST["fullname"] ?? "";
$email = $_POST["email"] ?? "";
$phone = $_POST["phone"] ?? "";
$bdate = $_POST["bdate"] ?? "";
$gender = $_POST["gender"] ?? "";
$address1 = $_POST["address1"] ?? "";
$address2 = $_POST["address2"] ?? "";
$country = $_POST["country"] ?? "";
$city = $_POST["city"] ?? "";
$region = $_POST["region"] ?? "";
$postal = $_POST["postal"] ?? "";

// Validation
if (empty($fullname)) {
    echo "Full name is empty <br>";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email is invalid <br>";
    exit;
}

// Phone validation: allow letters, digits, spaces, and common symbols
$phoneRegex = "/^[+\d\s().\-]{7,}$/";
$digitsCount = strlen(preg_replace("/\D/", "", $phone));
if (!preg_match($phoneRegex, $phone) || $digitsCount < 7) {
    echo "Phone number must contain at least 7 digits <br>";
    exit;
}

if (empty($bdate)) {
    echo "Date of birth is empty <br>";
    exit;
}

// Validate age (must be at least 13 years old)
$birthDate = new DateTime($bdate);
$today = new DateTime();
$age = $today->diff($birthDate)->y;
if ($age < 13) {
    echo "You must be at least 13 years old <br>";
    exit;
}

if (empty($address1)) {
    echo "Street address is empty <br>";
    exit;
}

if (empty($country)) {
    echo "Country is empty <br>";
    exit;
}

if (empty($city)) {
    echo "City is empty <br>";
    exit;
}

// Optional postal code validation
if (!empty($postal)) {
    $postalRegex = "/^[A-Z0-9\s\-]{3,10}$/i";
    if (!preg_match($postalRegex, $postal)) {
        echo "Postal code format is invalid <br>";
        exit;
    }
}

echo "Registration successful: <br>
 Full Name: " . htmlspecialchars($fullname, ENT_QUOTES, 'UTF-8') . " <br>
 Email: " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . " <br>
 Phone: " . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . " <br>
 Date of Birth: " . htmlspecialchars($bdate, ENT_QUOTES, 'UTF-8') . " <br>
 Gender: " . htmlspecialchars($gender, ENT_QUOTES, 'UTF-8') . " <br>
 Address: " . htmlspecialchars($address1, ENT_QUOTES, 'UTF-8');

if (!empty($address2)) {
    echo " " . htmlspecialchars($address2, ENT_QUOTES, 'UTF-8');
}

echo " <br>
 City: " . htmlspecialchars($city, ENT_QUOTES, 'UTF-8') . " <br>
 Country: " . htmlspecialchars($country, ENT_QUOTES, 'UTF-8') . " <br>";

if (!empty($region)) {
    echo " Region/State: " . htmlspecialchars($region, ENT_QUOTES, 'UTF-8') . " <br>";
}

if (!empty($postal)) {
    echo " Postal Code: " . htmlspecialchars($postal, ENT_QUOTES, 'UTF-8') . " <br>";
}

?>

