<?php


// Function to calculate student grade


function calculateGrade($cgpa)
{

    if ($cgpa >= 9) {

        return [
            "grade" => "A+",
            "message" => "Outstanding Performance",
            "color" => "success"
        ];

    } elseif ($cgpa >= 8) {

        return [
            "grade" => "A",
            "message" => "Excellent Performance",
            "color" => "success"
        ];

    } elseif ($cgpa >= 7) {

        return [
            "grade" => "B",
            "message" => "Very Good Performance",
            "color" => "primary"
        ];

    } elseif ($cgpa >= 6) {

        return [
            "grade" => "C",
            "message" => "Good Performance",
            "color" => "info"
        ];

    } elseif ($cgpa >= 5) {

        return [
            "grade" => "D",
            "message" => "Average Performance",
            "color" => "warning"
        ];

    } else {

        return [
            "grade" => "F",
            "message" => "Needs Improvement",
            "color" => "danger"
        ];

    }

}



// Empty variables


$name = "";

$email = "";

$cgpa = "";

$branch = "";

$college = "";

$gender = "";

$course = "";

$address = "";

$error = "";



// Check POST request


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Receive all form data


    $name = trim($_POST["name"] ?? "");

    $email = trim($_POST["email"] ?? "");

    $cgpa = trim($_POST["cgpa"] ?? "");

    $branch = trim($_POST["branch"] ?? "");

    $college = trim($_POST["college"] ?? "");

    $gender = $_POST["gender"] ?? "";

    $course = $_POST["course"] ?? "";

    $address = trim($_POST["address"] ?? "");



    // Check for empty inputs before processing


    if (
        empty($name) ||
        empty($email) ||
        $cgpa === "" ||
        empty($branch) ||
        empty($college) ||
        empty($gender) ||
        empty($course) ||
        empty($address)
    ) {

        $error = "All fields are required. Please complete the registration form.";

    }



    // Validate email


    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $error = "Please enter a valid email address.";

    }



    // Validate CGPA


    elseif (!is_numeric($cgpa) || $cgpa < 0 || $cgpa > 10) {

        $error = "CGPA must be a number between 0 and 10.";

    }



    // Process data only after validation


    else {

        $gradeData = calculateGrade((float)$cgpa);

        $grade = $gradeData["grade"];

        $gradeMessage = $gradeData["message"];

        $gradeColor = $gradeData["color"];

    }

}



// Include shared header


include "header.php";


?>



<div class="container py-5">


    <div class="row justify-content-center">


        <div class="col-lg-8">



            <?php if (!empty($error)) { ?>



                <!-- Validation Error -->


                <div class="alert alert-danger shadow-lg p-4">


                    <h4 class="alert-heading fw-bold">


                        <i class="fa-solid fa-circle-exclamation me-2"></i>


                        Registration Error


                    </h4>


                    <p class="mb-3">


                        <?php echo htmlspecialchars($error); ?>


                    </p>


                    <a href="index.php"
                       class="btn btn-danger">


                        <i class="fa-solid fa-arrow-left me-2"></i>


                        Back to Registration


                    </a>


                </div>



            <?php } else { ?>



                <!-- Confirmation Card -->


                <div class="card registration-card shadow-lg">



                    <!-- Gradient Confirmation Header -->


                    <div class="confirmation-header">


                        <i class="fa-solid fa-circle-check fa-4x mb-3"></i>


                        <h2 class="fw-bold">


                            Welcome,
                            <?php echo htmlspecialchars($name); ?>!


                        </h2>


                        <p class="mb-0">


                            Your registration has been confirmed successfully.


                        </p>


                    </div>



                    <!-- Confirmation Details -->


                    <div class="card-body p-4 p-md-5">



                        <!-- Profile Photo Placeholder -->


                        <div class="text-center mb-4">


                            <div class="profile-placeholder mb-3">


                                <i class="fa-solid fa-user-graduate"></i>


                            </div>


                            <span class="badge bg-primary fs-6">


                                Registered Student


                            </span>


                        </div>



                        <!-- Student Details -->


                        <h4 class="fw-bold mb-4">


                            <i class="fa-solid fa-id-card me-2 text-primary"></i>


                            Student Details


                        </h4>



                        <div class="detail-card">


                            <strong>


                                <i class="fa-solid fa-user me-2 text-primary"></i>


                                Name:


                            </strong>


                            <?php echo htmlspecialchars($name); ?>


                        </div>



                        <div class="detail-card">


                            <strong>


                                <i class="fa-solid fa-envelope me-2 text-primary"></i>


                                Email:


                            </strong>


                            <?php echo htmlspecialchars($email); ?>


                        </div>



                        <div class="detail-card">


                            <strong>


                                <i class="fa-solid fa-code-branch me-2 text-primary"></i>


                                Branch:


                            </strong>


                            <?php echo htmlspecialchars($branch); ?>


                        </div>



                        <div class="detail-card">


                            <strong>


                                <i class="fa-solid fa-building-columns me-2 text-primary"></i>


                                College:


                            </strong>


                            <?php echo htmlspecialchars($college); ?>


                        </div>



                        <div class="detail-card">


                            <strong>


                                <i class="fa-solid fa-venus-mars me-2 text-primary"></i>


                                Gender:


                            </strong>


                            <?php echo htmlspecialchars($gender); ?>


                        </div>



                        <div class="detail-card">


                            <strong>


                                <i class="fa-solid fa-book-open me-2 text-primary"></i>


                                Course:


                            </strong>


                            <?php echo htmlspecialchars($course); ?>


                        </div>



                        <div class="detail-card">


                            <strong>


                                <i class="fa-solid fa-location-dot me-2 text-primary"></i>


                                Address:


                            </strong>


                            <?php echo htmlspecialchars($address); ?>


                        </div>



                        <!-- Grade Logic Result -->


                        <div class="alert alert-<?php echo $gradeColor; ?> mt-4">


                            <h4 class="alert-heading fw-bold">


                                <i class="fa-solid fa-award me-2"></i>


                                Academic Grade:
                                <?php echo $grade; ?>


                            </h4>


                            <p class="mb-1">


                                CGPA:
                                <strong>

                                    <?php echo htmlspecialchars($cgpa); ?>

                                </strong>


                            </p>


                            <p class="mb-0">


                                <?php echo $gradeMessage; ?>


                            </p>


                        </div>



                        <!-- Today's Date -->


                        <div class="text-center mt-4">


                            <span class="badge bg-dark p-3">


                                <i class="fa-solid fa-calendar-days me-2"></i>


                                Registration Date:


                                <?php echo date("d F Y"); ?>


                            </span>


                        </div>



                        <!-- Button -->


                        <a href="index.php"
                           class="btn btn-success w-100 mt-4">


                            <i class="fa-solid fa-user-plus me-2"></i>


                            Register Another Student


                        </a>


                    </div>


                </div>



            <?php } ?>


        </div>


    </div>


</div>



<?php


// Include shared footer


include "footer.php";


?>