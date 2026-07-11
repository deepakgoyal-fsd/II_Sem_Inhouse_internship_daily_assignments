<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: registrationForm.html");
    exit;
}

$name = trim($_POST["textName"] ?? "");
$email = trim($_POST["txtMail"] ?? "");
$phone = trim($_POST["txtPhone"] ?? "");
$gender = $_POST["gender"] ?? "";
$dob = $_POST["dtDOB"] ?? "";
$password = $_POST["pwdPassword"] ?? "";
$confirmPassword = $_POST["pwdConfirmPassword"] ?? "";

$errors = [];

if ($name === "") {
    $errors[] = "Name is required.";
} elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
    $errors[] = "Name should contain only letters and spaces.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email address.";
}

if (!preg_match("/^[0-9]{10}$/", $phone)) {
    $errors[] = "Phone number must be exactly 10 digits.";
}

if ($gender === "") {
    $errors[] = "Please select a gender.";
}

if ($dob === "") {
    $errors[] = "Date of birth is required.";
} else {
    $dobDate = DateTime::createFromFormat("Y-m-d", $dob);
    if (!$dobDate || $dobDate->format("Y-m-d") !== $dob) {
        $errors[] = "Invalid date of birth.";
    } elseif ($dobDate > new DateTime()) {
        $errors[] = "Date of birth cannot be in the future.";
    }
}

if (strlen($password) < 8 || strlen($password) > 16) {
    $errors[] = "Password must be 8-16 characters.";
}

if ($password !== $confirmPassword) {
    $errors[] = "Passwords do not match.";
}

// Check for duplicate email
if (empty($errors)) {
    $check = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();
    if ($check->num_rows > 0) {
        $errors[] = "An account with this email already exists.";
    }
    $check->close();
}

// Insert into DB only if everything passed
if (empty($errors)) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "INSERT INTO users (name, email, phone, gender, dob, password) VALUES (?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("ssssss", $name, $email, $phone, $gender, $dob, $hashedPassword);

    if (!$stmt->execute()) {
        $errors[] = "Database error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Result</title>
    <link rel="stylesheet" href="CSS/style.css"/>
</head>
<body>
<?php if (!empty($errors)): ?>
    <h1>Registration Failed</h1>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?php echo htmlspecialchars($error); ?></li>
        <?php endforeach; ?>
    </ul>
    <a href="registrationForm.html">Go back and try again</a>
<?php else: ?>
    <h1>Registration Successful</h1>
    <p><strong>Name:</strong> <?php echo htmlspecialchars($name); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
    <p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>
    <p><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></p>
    <p><strong>D.O.B:</strong> <?php echo htmlspecialchars($dob); ?></p>
<?php endif; ?>
</body>
</html>