<?php
$page = "home";
include 'header.php';
include 'functions.php';

$errors = [];
$name = trim($_POST['student_name'] ?? '');
$email = trim($_POST['email'] ?? '');
$cgpa = trim($_POST['cgpa'] ?? '');
$college = trim($_POST['college'] ?? '');
$gender = $_POST['gender'] ?? '';
$course = $_POST['course'] ?? '';
$address = trim($_POST['address'] ?? '');

if (empty($name)) {
    $errors[] = "Name is required.";
} elseif (preg_match('/[0-9]/', $name)) {
    $errors[] = "Name cannot contain numbers.";
}

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address.";
}

if (empty($cgpa) || !is_numeric($cgpa)) {
    $errors[] = "Please enter a valid CGPA.";
}

if (empty($college)) {
    $errors[] = "College name is required.";
}

if (empty($gender)) {
    $errors[] = "Please select a gender.";
}

if (empty($course)) {
    $errors[] = "Please select a course.";
}

if (empty($address) || strlen($address) < 10) {
    $errors[] = "Address must be at least 10 characters long.";
}

if (!empty($errors)) {
    echo '
    <div class="row justify-content-center">
    <div class="col-md-8">
    <div class="alert alert-danger shadow border-danger">
        <h4 class="alert-heading text-danger"><i class="fas fa-exclamation-triangle"></i> Validation Failed</h4>
        <p>Please fix the following issues to complete your registration:</p>
        <hr>
        <ul class="mb-0">';
    foreach ($errors as $error) {
        echo '<li>' . htmlspecialchars($error) . '</li>';
    }
    echo '
        </ul>
        <a href="index.php" class="btn btn-outline-danger mt-3 btn-sm"><i class="fas fa-arrow-left"></i> Go Back to Form</a>
    </div>
    </div>
    </div>';
} else {
    $gradeInfo = calculateGrade((float)$cgpa);
    $currentDate = getFormattedDate();
    $greeting = getGreeting();

    echo '
    <div class="row justify-content-center">
    <div class="col-lg-8">
    <div class="card shadow-lg border-0">
    <div class="card-header gradient-header text-center py-4">
    <h2 class="mb-1">' . htmlspecialchars($greeting) . ', ' . htmlspecialchars($name) . '!</h2>
    <p class="mb-0 opacity-75"><i class="far fa-calendar-alt"></i> ' . htmlspecialchars($currentDate) . '</p>
    </div>
    <div class="card-body p-4">
    
    <div class="text-center mb-4">
    <div style="width:120px;height:120px;background:#e2e8f0;border-radius:50%;display:inline-flex;align-items:center;justify-content:center;font-size:3rem;color:#94a3b8;border:4px solid white;box-shadow:0 4px 6px rgba(0,0,0,0.1);margin-top:-60px;position:relative;z-index:2;background-color:white;">
    <i class="fas fa-user text-primary"></i>
    </div>
    </div>
    
    <div class="alert ' . htmlspecialchars($gradeInfo['class']) . ' text-center mb-4 shadow-sm border-0">
    <h5 class="alert-heading mb-1"><i class="fas fa-award"></i> Performance Status: ' . htmlspecialchars($gradeInfo['text']) . '</h5>
    <p class="mb-0">Recorded CGPA: <strong>' . htmlspecialchars($cgpa) . '</strong></p>
    </div>
    
    <div class="row">
    <div class="col-md-6 mb-3">
    <h6 class="text-muted text-uppercase mb-1" style="font-size:0.8rem;"><i class="fas fa-envelope"></i> Email</h6>
    <p class="fw-bold">' . htmlspecialchars($email) . '</p>
    </div>
    <div class="col-md-6 mb-3">
    <h6 class="text-muted text-uppercase mb-1" style="font-size:0.8rem;"><i class="fas fa-university"></i> College</h6>
    <p class="fw-bold">' . htmlspecialchars($college) . '</p>
    </div>
    <div class="col-md-6 mb-3">
    <h6 class="text-muted text-uppercase mb-1" style="font-size:0.8rem;"><i class="fas fa-venus-mars"></i> Gender</h6>
    <p class="fw-bold">' . htmlspecialchars($gender) . '</p>
    </div>
    <div class="col-md-6 mb-3">
    <h6 class="text-muted text-uppercase mb-1" style="font-size:0.8rem;"><i class="fas fa-book"></i> Course</h6>
    <p class="fw-bold">' . htmlspecialchars($course) . '</p>
    </div>
    <div class="col-12 mb-3">
    <h6 class="text-muted text-uppercase mb-1" style="font-size:0.8rem;"><i class="fas fa-map-marker-alt"></i> Address</h6>
    <p class="fw-bold">' . nl2br(htmlspecialchars($address)) . '</p>
    </div>
    </div>
    
    </div>
    <div class="card-footer bg-light text-center py-3 border-top-0">
    <a href="index.php" class="btn btn-outline-primary px-4"><i class="fas fa-plus"></i> Register Another</a>
    </div>
    </div>
    </div>
    </div>';
}

include 'footer.php' ?>;
