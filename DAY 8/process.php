<?php
session_start();
require 'functions.php';

// Only accept POST — direct GET access to this file should not work
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$name    = $_POST['name'] ?? '';
$email   = $_POST['email'] ?? '';
$cgpa    = $_POST['cgpa'] ?? '';
$branch  = $_POST['branch'] ?? '';
$college = $_POST['college'] ?? '';

$errors = [];

if (trim($name) === '') {
    $errors[] = 'Name is required.';
}

if (trim($email) === '') {
    $errors[] = 'Email is required.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email format is invalid.';
}

if (trim($cgpa) === '') {
    $errors[] = 'CGPA is required.';
} elseif (!is_numeric($cgpa) || $cgpa < 0 || $cgpa > 10) {
    $errors[] = 'CGPA must be a number between 0 and 10.';
}

if (trim($branch) === '') {
    $errors[] = 'Branch is required.';
}

if (trim($college) === '') {
    $errors[] = 'College name is required.';
}

// If validation fails, send the user back with their input preserved
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['old_input'] = [
        'name' => sanitize($name),
        'email' => sanitize($email),
        'cgpa' => sanitize($cgpa),
        'branch' => sanitize($branch),
        'college' => sanitize($college),
    ];
    header('Location: index.php');
    exit;
}

// Passed validation — clean values for display
$name    = sanitize($name);
$email   = sanitize($email);
$cgpa    = sanitize($cgpa);
$branch  = sanitize($branch);
$college = sanitize($college);

$result = calculateGrade($cgpa);

include 'header.php';
?>

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">

        <div class="card card-shadow border-0 overflow-hidden">
            <div class="gradient-bg text-white text-center py-5">
                <img src="https://via.placeholder.com/100x100.png?text=Photo"
                     class="rounded-circle border border-3 border-white mb-3"
                     alt="Profile placeholder">
                <h4 class="mb-0"><?php echo $name; ?></h4>
                <small><?php echo $email; ?></small>
            </div>

            <div class="card-body p-4">
                <h5 class="mb-3"><i class="fa-solid fa-circle-check text-success"></i> Registration Confirmed</h5>

                <table class="table table-borderless mb-3">
                    <tr>
                        <th><i class="fa-solid fa-building-columns"></i> Branch</th>
                        <td><?php echo $branch; ?></td>
                    </tr>
                    <tr>
                        <th><i class="fa-solid fa-school"></i> College</th>
                        <td><?php echo $college; ?></td>
                    </tr>
                    <tr>
                        <th><i class="fa-solid fa-chart-line"></i> CGPA</th>
                        <td><?php echo $cgpa; ?></td>
                    </tr>
                    <tr>
                        <th><i class="fa-solid fa-calendar-day"></i> Date</th>
                        <td><?php echo date("d F Y"); ?></td>
                    </tr>
                </table>

                <div class="alert alert-<?php echo $result['class']; ?> text-center">
                    <strong>Grade: <?php echo $result['grade']; ?></strong><br>
                    <?php echo $result['remark']; ?>
                </div>

                <a href="index.php" class="btn btn-outline-primary w-100">
                    <i class="fa-solid fa-arrow-left"></i> Register Another Student
                </a>
            </div>
        </div>

    </div>
</div>

<?php include 'footer.php'; ?>