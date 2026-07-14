<?php

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    

    // Name Validation
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    // Email Validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    // Phone Validation
    if (!is_numeric($phone)) {
        $errors[] = "Phone number must contain only digits.";
    } elseif (strlen($phone) != 10) {
        $errors[] = "Phone number must be exactly 10 digits."
    // Success
    if (empty($errors)) {
        echo "<div class='alert alert-success'>Registration Successful!</div>";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

<form method="POST">

    <input type="text" name="name" class="form-control mb-3" placeholder="Name">

    <input type="email" name="email" class="form-control mb-3" placeholder="Email">

    <input type="text" name="phone" class="form-control mb-3" placeholder="Phone">

    <button class="btn btn-primary">Register</button>

</form>

<?php

if (!empty($errors)) {

    echo "<div class='alert alert-danger mt-3'><ul>";

    foreach ($errors as $error) {
        echo "<li>$error</li>";
    }

    echo "</ul></div>";
}

?>

</div>

</body>
</html>