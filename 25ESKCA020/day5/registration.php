<?php
/* =====================================================================
   PRAVAH 2026 — REGISTRATION.PHP
   Handles registration form submission:
   - Receives POST data
   - Validates & sanitizes inputs
   - Inserts into MySQL using prepared statements (SQL injection safe)
   - Displays Bootstrap success/error alerts
   Field names match the "registrations" table defined in database.sql
   ===================================================================== */

/* ---------------------------------------------------------------------
   1. DATABASE CONNECTION
   Reuses the shared connection file (database.php) instead of
   duplicating credentials here.
   --------------------------------------------------------------------- */
require_once "database.php"; // provides the $conn (mysqli) object

// Variables to hold feedback messages for the user
$successMessage = "";
$errorMessages  = []; // collect multiple validation errors here

/* ---------------------------------------------------------------------
   2. ONLY PROCESS THE FORM WHEN IT IS SUBMITTED VIA POST
   --------------------------------------------------------------------- */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    /* -------------------------------------------------------------
       2.1 COLLECT & SANITIZE RAW INPUT
       trim()             -> removes extra whitespace
       htmlspecialchars() -> prevents HTML/JS injection (XSS)
       ------------------------------------------------------------- */
    $fullName    = htmlspecialchars(trim($_POST["full_name"] ?? ""));
    $email       = htmlspecialchars(trim($_POST["email"] ?? ""));
    $mobile      = htmlspecialchars(trim($_POST["mobile"] ?? ""));
    $collegeName = htmlspecialchars(trim($_POST["college_name"] ?? ""));
    $branch      = htmlspecialchars(trim($_POST["branch"] ?? ""));
    $academicYear = htmlspecialchars(trim($_POST["academic_year"] ?? ""));
    $gender      = htmlspecialchars(trim($_POST["gender"] ?? ""));
    $city        = htmlspecialchars(trim($_POST["city"] ?? ""));
    $eventCategory = htmlspecialchars(trim($_POST["event_category"] ?? ""));
    $previousExperience = htmlspecialchars(trim($_POST["previous_experience"] ?? ""));

    /* -------------------------------------------------------------
       2.2 SERVER-SIDE VALIDATION
       Never trust client-side (JS/HTML) validation alone.
       ------------------------------------------------------------- */

    // --- Full Name: required, letters/spaces only, min 3 chars ---
    if ($fullName === "") {
        $errorMessages[] = "Full name is required.";
    } elseif (!preg_match("/^[a-zA-Z\s]{3,100}$/", $fullName)) {
        $errorMessages[] = "Full name must be 3-100 letters and spaces only.";
    }

    // --- Email: required, valid format ---
    if ($email === "") {
        $errorMessages[] = "Email address is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessages[] = "Please enter a valid email address.";
    }

    // --- Mobile: required, exactly 10 digits, starts 6-9 (India format) ---
    if ($mobile === "") {
        $errorMessages[] = "Mobile number is required.";
    } elseif (!preg_match("/^[6-9][0-9]{9}$/", $mobile)) {
        $errorMessages[] = "Mobile number must be a valid 10-digit number.";
    }

    // --- College Name: required ---
    if ($collegeName === "") {
        $errorMessages[] = "College name is required.";
    }

    // --- Branch: required ---
    if ($branch === "") {
        $errorMessages[] = "Branch is required.";
    }

    // --- Academic Year: required ---
    $allowedYears = ["1st Year", "2nd Year", "3rd Year", "4th Year"];
    if ($academicYear === "" || !in_array($academicYear, $allowedYears)) {
        $errorMessages[] = "Please select a valid academic year.";
    }

    // --- Gender: required, must be one of allowed values ---
    $allowedGenders = ["Male", "Female", "Other"];
    if ($gender === "" || !in_array($gender, $allowedGenders)) {
        $errorMessages[] = "Please select a gender.";
    }

    // --- City: required ---
    if ($city === "") {
        $errorMessages[] = "City is required.";
    }

    // --- Event Category: required ---
    if ($eventCategory === "") {
        $errorMessages[] = "Please select an event category.";
    }

    // --- Previous Experience: required, must be Yes/No ---
    $allowedExperience = ["Yes", "No"];
    if ($previousExperience === "" || !in_array($previousExperience, $allowedExperience)) {
        $errorMessages[] = "Please indicate your previous experience.";
    }

    /* -------------------------------------------------------------
       2.3 CHECK FOR DUPLICATE EMAIL (prevents double registration)
       ------------------------------------------------------------- */
    if (empty($errorMessages)) {
        $checkStmt = $conn->prepare("SELECT id FROM registrations WHERE email = ? LIMIT 1");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $errorMessages[] = "This email is already registered for PRAVAH 2026.";
        }
        $checkStmt->close();
    }

    /* -------------------------------------------------------------
       2.4 IF NO VALIDATION ERRORS, INSERT INTO DATABASE
       Using a PREPARED STATEMENT completely prevents SQL Injection,
       since values are bound separately from the query structure.
       ------------------------------------------------------------- */
    if (empty($errorMessages)) {

        // Prepared INSERT statement with placeholders (?)
        $insertStmt = $conn->prepare(
            "INSERT INTO registrations
             (full_name, email, mobile, college_name, branch, academic_year,
              gender, city, event_category, previous_experience, registration_date)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())"
        );

        // "ssssssssss" = 10 string-type parameters, in the same order as above
        $insertStmt->bind_param(
            "ssssssssss",
            $fullName,
            $email,
            $mobile,
            $collegeName,
            $branch,
            $academicYear,
            $gender,
            $city,
            $eventCategory,
            $previousExperience
        );

        if ($insertStmt->execute()) {
            $successMessage = "🎉 Registration successful! We look forward to seeing you at PRAVAH 2026.";
            // Clear form field values after success
            $fullName = $email = $mobile = $collegeName = $branch = $academicYear = "";
            $gender = $city = $eventCategory = $previousExperience = "";
        } else {
            $errorMessages[] = "Something went wrong while saving your registration. Please try again.";
        }

        $insertStmt->close();
    }

    // Close the database connection
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ===== Meta Information ===== -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Status | PRAVAH 2026</title>

    <!-- ===== Bootstrap 5 CSS (CDN) ===== -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- ===== Custom CSS (reuses the same design system) ===== -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- ==================================================
         3. DISPLAY FEEDBACK MESSAGES (Bootstrap Alerts)
         ================================================== -->
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">

                    <?php if ($successMessage !== ""): ?>
                        <!-- Success Alert -->
                        <div class="alert alert-success glass-card p-4" role="alert">
                            <?php echo $successMessage; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($errorMessages)): ?>
                        <!-- Error Alert (lists every validation issue found) -->
                        <div class="alert alert-danger glass-card p-4" role="alert">
                            <strong>Please fix the following:</strong>
                            <ul class="mb-0 mt-2">
                                <?php foreach ($errorMessages as $error): ?>
                                    <li><?php echo $error; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <!-- Link back to the registration form -->
                    <div class="text-center mt-4">
                        <a href="register.html" class="btn btn-gradient-primary rounded-pill px-4">
                            Back to Registration Page
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ===== Bootstrap 5 JS Bundle (CDN) ===== -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>