<?php
// Initialize variables
$errors = [];
$success = false;
$name = $email = $gender = $course = $city = '';
$skills = [];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration — SKIT Registration</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <link href="style.css" rel="stylesheet">
</head>
<body>

<?php include "header.php" ?>

<main class="page">
    <div class="ledger-card">
        <p class="ledger-card__eyebrow">Form 02 &middot; Full Enrolment</p>
        <h1 class="ledger-card__title">Student Registration</h1>
        <p class="ledger-card__sub">Six fields, in order. Everything is required before the entry can be filed.</p>

        <?php if (!empty($errors)): ?>
            <div class="notice notice-error">
                <strong>The entry could not be filed:</strong>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="notice notice-success">Registration successful — record filed below.</div>
            <div class="receipt">
                <div class="receipt__row"><span class="receipt__label">Name</span><span class="receipt__value"><?= htmlspecialchars($name) ?></span></div>
                <div class="receipt__row"><span class="receipt__label">Email</span><span class="receipt__value"><?= htmlspecialchars($email) ?></span></div>
                <div class="receipt__row"><span class="receipt__label">Gender</span><span class="receipt__value"><?= htmlspecialchars($gender) ?></span></div>
                <div class="receipt__row"><span class="receipt__label">Course</span><span class="receipt__value"><?= htmlspecialchars($course) ?></span></div>
                <div class="receipt__row"><span class="receipt__label">Skills</span><span class="receipt__value"><?= htmlspecialchars(implode(", ", $skills)) ?></span></div>
                <div class="receipt__row"><span class="receipt__label">City</span><span class="receipt__value"><?= htmlspecialchars($city) ?></span></div>
            </div>
        <?php endif; ?>

        <form method="POST" style="margin-top: 8px;">

            <div class="field-row">
                <span class="field-row__num">01</span>
                <div class="field-row__body">
                    <label for="name">Full name</label>
                    <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>">
                </div>
            </div>

            <div class="field-row">
                <span class="field-row__num">02</span>
                <div class="field-row__body">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
                </div>
            </div>

            <div class="field-row">
                <span class="field-row__num">03</span>
                <div class="field-row__body">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password">
                    <p class="field-hint">At least 6 characters.</p>
                </div>
            </div>

            <div class="field-row">
                <span class="field-row__num">04</span>
                <div class="field-row__body">
                    <label>Gender</label>
                    <div class="choice-group">
                        <label><input type="radio" name="gender" value="Male" <?= $gender === 'Male' ? 'checked' : '' ?>> Male</label>
                        <label><input type="radio" name="gender" value="Female" <?= $gender === 'Female' ? 'checked' : '' ?>> Female</label>
                    </div>
                </div>
            </div>

            <div class="field-row">
                <span class="field-row__num">05</span>
                <div class="field-row__body">
                    <label for="course">Course</label>
                    <select id="course" name="course">
                        <option value="">Select</option>
                        <option value="Web Development" <?= $course === 'Web Development' ? 'selected' : '' ?>>Web Development</option>
                        <option value="Java" <?= $course === 'Java' ? 'selected' : '' ?>>Java</option>
                        <option value="Python" <?= $course === 'Python' ? 'selected' : '' ?>>Python</option>
                    </select>
                </div>
            </div>

            <div class="field-row">
                <span class="field-row__num">06</span>
                <div class="field-row__body">
                    <label>Skills</label>
                    <div class="choice-group">
                        <label><input type="checkbox" name="skills[]" value="HTML" <?= in_array('HTML', $skills) ? 'checked' : '' ?>> HTML</label>
                        <label><input type="checkbox" name="skills[]" value="CSS" <?= in_array('CSS', $skills) ? 'checked' : '' ?>> CSS</label>
                        <label><input type="checkbox" name="skills[]" value="JavaScript" <?= in_array('JavaScript', $skills) ? 'checked' : '' ?>> JavaScript</label>
                    </div>
                </div>
            </div>

            <div class="field-row">
                <span class="field-row__num">07</span>
                <div class="field-row__body">
                    <label for="city">City</label>
                    <select id="city" name="city">
                        <option value="">Select City</option>
                        <option value="Delhi" <?= $city === 'Delhi' ? 'selected' : '' ?>>Delhi</option>
                        <option value="Mumbai" <?= $city === 'Mumbai' ? 'selected' : '' ?>>Mumbai</option>
                        <option value="Bangalore" <?= $city === 'Bangalore' ? 'selected' : '' ?>>Bangalore</option>
                    </select>
                </div>
            </div>

            <button class="btn btn-primary btn-block" type="submit">Register</button>
        </form>
    </div>
</main>

<?php include "footer.php" ?>
</body>
</html>
