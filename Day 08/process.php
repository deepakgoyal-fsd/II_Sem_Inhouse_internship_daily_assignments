<?php
$errors = [];
$name = $_POST['student_name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$gender = $_POST['gender'] ?? '';
$course = $_POST['course'] ?? '';
$address = $_POST['address'] ?? '';

if (empty($name)) {
    $errors[] = "Name is required.";
} elseif (preg_match('/[0-9]/', $name)) {
    $errors[] = "Name cannot contain numbers.";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address.";
}

if (strlen($phone) !== 10 || !is_numeric($phone)) {
    $errors[] = "Phone number must be exactly 10 digits and contain only numbers.";
}

if (empty($gender)) {
    $errors[] = "Please select a gender.";
}

if (empty($address) || strlen($address) < 10) {
    $errors[] = "Address must be at least 10 characters long.";
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Processing Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

                <?php if (count($errors) > 0): ?>
                    <div class="alert alert-danger shadow border-danger">
                        <h4 class="alert-heading text-danger">Validation Errors!</h4>
                        <p>Please fix the following issues to complete your registration:</p>
                        <hr>
                        <ul class="mb-0">
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="register.php" class="btn btn-outline-danger mt-3 btn-sm">Go Back to Form</a>
                    </div>
                <?php else: ?>
                    <div class="card shadow-lg border-success">
                        <div class="card-header bg-success text-white">
                            <h4 class="mb-0 text-center">Registration Successful</h4>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title text-success text-center mb-4">Welcome, <?= htmlspecialchars($name) ?>!</h4>

                            <div class="text-center mb-4">
                                <div style="width:120px;height:120px;background:#e9ecef;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;color:#6c757d;border:3px solid #198754; margin: 0 auto; font-size: 0.85rem;">
                                    [Profile Photo]
                                </div>
                            </div>

                            <div class="row mb-2 border-bottom pb-2">
                                <div class="col-sm-4 fw-bold text-muted">Email Address</div>
                                <div class="col-sm-8 text-end"><?= htmlspecialchars($email) ?></div>
                            </div>
                            <div class="row mb-2 border-bottom pb-2">
                                <div class="col-sm-4 fw-bold text-muted">Phone Number</div>
                                <div class="col-sm-8 text-end"><?= htmlspecialchars($phone) ?></div>
                            </div>
                            <div class="row mb-2 border-bottom pb-2">
                                <div class="col-sm-4 fw-bold text-muted">Gender</div>
                                <div class="col-sm-8 text-end"><?= htmlspecialchars($gender) ?></div>
                            </div>
                            <div class="row mb-2 border-bottom pb-2">
                                <div class="col-sm-4 fw-bold text-muted">Course Enrolled</div>
                                <div class="col-sm-8 text-end"><?= htmlspecialchars($course) ?></div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-4 fw-bold text-muted">Home Address</div>
                                <div class="col-sm-8 text-end"><?= nl2br(htmlspecialchars($address)) ?></div>
                            </div>

                        </div>
                        <div class="card-footer bg-white text-center">
                            <a href="register.php" class="btn btn-primary">Register Another Student</a>
                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</body>

</html>