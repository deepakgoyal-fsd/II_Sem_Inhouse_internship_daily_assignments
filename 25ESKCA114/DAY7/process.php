<?php
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = trim($_POST['name']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'] ?? '';
    $sport = $_POST['sport'];
    $address = trim($_POST['address']);
    $branch = $_POST['branch'];

    // Name validation
    if (empty($name) || strlen($name) < 3) {
        $errors[] = "Name must be at least 3 characters long.";
    }

    // Phone validation (10 digits)
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Phone must be 10 digits.";
    }

    // Address validation
    if (strlen($address) < 10) {
        $errors[] = "Address must be at least 10 characters.";
    }

    // Gender validation
    if (empty($gender)) {
        $errors[] = "Please select gender.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

<?php if (!empty($errors)) { ?>

    <div class="alert alert-danger">
        <h4>Errors:</h4>
        <ul>
            <?php foreach ($errors as $error) {
                echo "<li>$error</li>";
            } ?>
        </ul>
    </div>

<?php } else { ?>

    <h2 class="text-success text-center">
        Registration Received - Welcome <?php echo $name; ?>
    </h2>

    <div class="card mt-4 shadow">
        <div class="card-body">

            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Phone:</strong> <?php echo $phone; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
            <p><strong>Sport:</strong> <?php echo $sport; ?></p>
            <p><strong>Address:</strong> <?php echo $address; ?></p>
            <p><strong>Branch:</strong> <?php echo $branch; ?></p>

        </div>
    </div>

<?php } ?>

</div>

</body>
</html>