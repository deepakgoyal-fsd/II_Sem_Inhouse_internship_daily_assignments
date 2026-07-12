<?php
// Initialize variables
$errors = [];
$success = false;

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

// if (isset($_POST['submit'])) {
// if (!empty($_POST)) {
// if (isset($_REQUEST['name'])) {

    // Fetch form values safely
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $gender   = $_POST['gender'] ?? '';
    $course   = $_POST['course'] ?? '';
    $skills   = $_POST['skills'] ?? [];
    $city     = $_POST['city'] ?? '';

    // ---------------- VALIDATION ----------------

    if ($name == '') {
        $errors[] = "Name is required";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required";
    }

    if (strlen($password) < 6) {
        $errors[] = "Password must be at least 6 characters";
    }

    if ($gender == '') {
        $errors[] = "Please select gender";
    }

    if ($course == '') {
        $errors[] = "Please select a course";
    }

    if (empty($skills)) {
        $errors[] = "Please select at least one skill";
    }

    if ($city == '') {
        $errors[] = "Please select a city";
    }

    // If no errors
    if (empty($errors)) {
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Registration</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <h2 class="text-center mb-4">Student Registration Form</h2>

        <!-- ERROR BOX -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?= $error ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- SUCCESS OUTPUT -->
        <?php if ($success): ?>
            <div class="alert alert-success">
                <h5>Registration Successful!</h5>
                <p><strong>Name:</strong> <?= $name ?></p>
                <p><strong>Email:</strong> <?= $email ?></p>
                <p><strong>Gender:</strong> <?= $gender ?></p>
                <p><strong>Course:</strong> <?= $course ?></p>
                <p><strong>Skills:</strong> <?= implode(", ", $skills) ?></p>
                <p><strong>City:</strong> <?= $city ?></p>
            </div>
        <?php endif; ?>

        <!-- REGISTRATION FORM -->
        <form method="POST" class="card p-4 shadow-sm">

            <!-- Name -->
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" value="<?= $name ?? '' ?>">
            </div>

            <!-- Email -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $email ?? '' ?>">
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>

            <!-- Gender (Radio) -->
            <div class="mb-3">
                <label class="form-label">Gender</label><br>
                <input type="radio" name="gender" value="Male"> Male
                <input type="radio" name="gender" value="Female"> Female
            </div>

            <!-- Course (Select) -->
            <div class="mb-3">
                <label class="form-label">Course</label>
                <select name="course" class="form-select">
                    <option value="">Select</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Java">Java</option>
                    <option value="Python">Python</option>
                </select>
            </div>

            <!-- Skills (Checkbox) -->
            <div class="mb-3">
                <label class="form-label">Skills</label><br>
                <input type="checkbox" name="skills[]" value="HTML"> HTML
                <input type="checkbox" name="skills[]" value="CSS"> CSS
                <input type="checkbox" name="skills[]" value="JavaScript"> JavaScript
            </div>

            <!-- City -->
            <div class="mb-3">
                <label class="form-label">City</label>
                <select name="city" class="form-select">
                    <option value="">Select City</option>
                    <option value="Delhi">Delhi</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Bangalore">Bangalore</option>
                </select>
            </div>

            <!-- Submit -->
            <button class="btn btn-primary w-100">Register</button>

        </form>

    </div>

</body>

</html>