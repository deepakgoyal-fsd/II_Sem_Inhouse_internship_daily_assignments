<?php 
$page = "home"; 
include 'header.php'; 

// MODULE 3: Custom Function for Dynamic Grade Bands and Bootstrap Colors
function calculateGrade($cgpa) {
    if ($cgpa >= 9.0) {
        return ["band" => "Excellent", "color" => "success", "icon" => "fa-star"];
    } elseif ($cgpa >= 8.0) {
        return ["band" => "Very Good", "color" => "primary", "icon" => "fa-thumbs-up"];
    } elseif ($cgpa >= 7.0) {
        return ["band" => "Good", "color" => "warning", "icon" => "fa-circle-check"];
    } else {
        return ["band" => "Keep Improving", "color" => "danger", "icon" => "fa-circle-exclamation"];
    }
}

// Custom Function for Formatted Date Challenge
function getFormattedDate() {
    return date("l, F j, Y");
}
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            // Collect Form Data
            $name = trim($_POST['student_name'] ?? '');
            $email = trim($_POST['student_email'] ?? '');
            $phone = trim($_POST['student_phone'] ?? '');
            $cgpa = trim($_POST['student_cgpa'] ?? '');
            $course = $_POST['student_course'] ?? '';
            $gender = $_POST['student_gender'] ?? '';
            $address = trim($_POST['student_address'] ?? '');

            $errors = [];

            // Validation Rules
            if (empty($name)) { $errors[] = "Full Name is required."; }
            elseif (preg_match('~[0-9]~', $name)) { $errors[] = "Name cannot contain numbers."; }

            if (empty($email)) { $errors[] = "Email Address is required."; }
            elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = "Please enter a valid email address."; }

            if (empty($phone)) { $errors[] = "Phone Number is required."; }
            elseif (!is_numeric($phone) || strlen($phone) !== 10) { $errors[] = "Phone number must be exactly 10 digits."; }

            if (empty($cgpa) || $cgpa < 0 || $cgpa > 10) { $errors[] = "Please enter a valid CGPA between 0 and 10."; }
            if (empty($course)) { $errors[] = "Please select a Course/Branch."; }
            if (empty($gender)) { $errors[] = "Gender selection is required."; }
            if (empty($address) || strlen($address) < 10) { $errors[] = "Address must be at least 10 characters long."; }

            // Error Display Setup
            if (count($errors) > 0) {
                echo '<div class="alert alert-danger shadow rounded-3 p-4" role="alert">';
                echo '<h4 class="alert-heading fw-bold"><i class="fa-solid fa-triangle-exclamation me-2"></i>Validation Failed!</h4>';
                echo '<hr><ul class="mb-3">';
                foreach ($errors as $error) { echo '<li>' . $error . '</li>'; }
                echo '</ul>';
                echo '<a href="index.php" class="btn btn-danger btn-sm rounded-2"><i class="fa-solid fa-arrow-left me-1"></i>Go Back and Fix</a>';
                echo '</div>';
            } 
            // Success State (Dynamic Welcome Card)
            else {
                // Execute grading function
                $gradeData = calculateGrade((float)$cgpa);
                ?>
                
                <div class="card shadow border-0 rounded-3 overflow-hidden">
                    <div class="card-header bg-success text-white text-center py-4 gradient-header">
                        <h3 class="mb-0"><i class="fa-solid fa-circle-check me-2"></i>Registration Confirmed!</h3>
                        <p class="mb-0 opacity-75">Welcome to the Portal, <?= htmlspecialchars($name) ?>!</p>
                    </div>
                    
                    <div class="card-body p-4">
                        <div class="alert alert-<?= $gradeData['color'] ?> d-flex align-items-center rounded-3 shadow-sm mb-4" role="alert">
                            <i class="fa-solid <?= $gradeData['icon'] ?> fs-4 me-3"></i>
                            <div>
                                <strong>Academic Performance Status:</strong> <?= $gradeData['band'] ?> (CGPA: <?= htmlspecialchars($cgpa) ?>)
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-sm-4 text-center mb-4 mb-sm-0">
                                <div class="bg-secondary text-white rounded-circle d-flex align-items-center justify-content-center mx-auto shadow" style="width: 130px; height: 130px; border: 4px solid #fff;">
                                    <i class="fa-solid fa-user-tie display-4"></i>
                                </div>
                                <span class="badge bg-dark mt-3 px-3 py-2 rounded-pill"><i class="fa-solid fa-id-card me-1"></i>Student Pass</span>
                            </div>

                            <div class="col-sm-8">
                                <h5 class="text-primary border-bottom pb-2 mb-3 fw-bold"><i class="fa-solid fa-address-card me-2"></i>Profile Summary</h5>
                                <div class="row g-2 small text-dark">
                                    <div class="col-6"><strong><i class="fa-solid fa-signature text-muted me-2"></i>Name:</strong></div>
                                    <div class="col-6"><?= htmlspecialchars($name) ?></div>

                                    <div class="col-6"><strong><i class="fa-solid fa-envelope text-muted me-2"></i>Email:</strong></div>
                                    <div class="col-6 text-truncate"><?= htmlspecialchars($email) ?></div>

                                    <div class="col-6"><strong><i class="fa-solid fa-phone text-muted me-2"></i>Phone:</strong></div>
                                    <div class="col-6"><?= htmlspecialchars($phone) ?></div>

                                    <div class="col-6"><strong><i class="fa-solid fa-code-branch text-muted me-2"></i>Branch:</strong></div>
                                    <div class="col-6"><span class="badge bg-secondary"><?= htmlspecialchars($course) ?></span></div>

                                    <div class="col-6"><strong><i class="fa-solid fa-venus-mars text-muted me-2"></i>Gender:</strong></div>
                                    <div class="col-6"><?= htmlspecialchars($gender) ?></div>

                                    <div class="col-6"><strong><i class="fa-solid fa-calendar-days text-muted me-2"></i>Generated Date:</strong></div>
                                    <div class="col-6 text-muted"><?= getFormattedDate() ?></div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <h6 class="fw-bold text-secondary"><i class="fa-solid fa-location-dot me-2"></i>Registered Address:</h6>
                            <p class="bg-light p-3 rounded-3 border border-1 text-muted small"><?= nl2br(htmlspecialchars($address)) ?></p>
                        </div>

                        <div class="d-flex justify-content-between text-muted border-top pt-3 mt-4" style="font-size: 0.75rem;">
                            <div><i class="fa-solid fa-network-wired me-1"></i>IP Address: <?= $_SERVER['REMOTE_ADDR'] ?></div>
                            <div><i class="fa-solid fa-clock me-1"></i>Server Time: <?= date("H:i:s") ?></div>
                        </div>
                    </div>

                    <div class="card-footer bg-light text-end py-3">
                        <a href="index.php" class="btn btn-outline-success btn-sm rounded-2"><i class="fa-solid fa-rotate-left me-1"></i>New Registration</a>
                    </div>
                </div>

                <?php
            }
        } else {
            echo "<div class='alert alert-warning'><i class='fa-solid fa-triangle-exclamation me-2'></i>Direct access is prohibited. Please submit the form.</div>";
        }
        ?>

        </div>
    </div>
</div>

<?php include 'footer.php'; ?>