<?php

// Array to store all validation errors

$errors = [];


// Variables to store form data

$name = "";
$email = "";
$branch = "";
$phone = "";
$gender = "";
$course = "";
$address = "";


// Check if form is submitted using POST method

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Receive form data

    $name = trim($_POST["name"] ?? "");

    $email = trim($_POST["email"] ?? "");

    $branch = trim($_POST["branch"] ?? "");

    $phone = trim($_POST["phone"] ?? "");

    $gender = $_POST["gender"] ?? "";

    $course = $_POST["course"] ?? "";

    $address = trim($_POST["address"] ?? "");



    // -------------------------
    // Name Validation
    // -------------------------

    if (empty($name)) {

        $errors[] = "Name is required.";

    } elseif (preg_match("/[0-9]/", $name)) {

        $errors[] = "Name cannot contain numbers.";

    }



    // -------------------------
    // Email Validation
    // -------------------------

    if (empty($email)) {

        $errors[] = "Email is required.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $errors[] = "Please enter a valid email address.";

    }



    // -------------------------
    // Branch Validation
    // -------------------------

    if (empty($branch)) {

        $errors[] = "Branch is required.";

    }



    // -------------------------
    // Phone Validation
    // -------------------------

    if (empty($phone)) {

        $errors[] = "Phone number is required.";

    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {

        $errors[] = "Phone number must contain exactly 10 digits.";

    }



    // -------------------------
    // Gender Validation
    // -------------------------

    if (empty($gender)) {

        $errors[] = "Please select your gender.";

    }



    // -------------------------
    // Course Validation
    // -------------------------

    if (empty($course)) {

        $errors[] = "Please select a course.";

    }



    // -------------------------
    // Address Validation
    // -------------------------

    if (empty($address)) {

        $errors[] = "Address is required.";

    } elseif (strlen($address) < 10) {

        $errors[] = "Address must contain at least 10 characters.";

    }

}

?>


<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Registration Result</title>


    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">


    <style>

        body {

            background: linear-gradient(135deg, #dbeafe, #f3e8ff);

            min-height: 100vh;

        }


        .result-card {

            border: none;

            border-radius: 20px;

            overflow: hidden;

        }


        .success-header {

            background: linear-gradient(135deg, #198754, #20c997);

            color: white;

            text-align: center;

            padding: 30px;

        }


        .profile-placeholder {

            width: 110px;

            height: 110px;

            border-radius: 50%;

            background-color: #e9ecef;

            display: flex;

            justify-content: center;

            align-items: center;

            font-size: 45px;

            margin: auto;

        }


        .student-detail {

            background-color: #f8f9fa;

            padding: 14px;

            border-radius: 10px;

            margin-bottom: 12px;

        }


        .error-card {

            border-radius: 15px;

        }

    </style>

</head>


<body>


    <div class="container py-5">


        <div class="row justify-content-center">


            <div class="col-lg-7">



                <?php if (!empty($errors)) { ?>


                    <!-- Error Box -->


                    <div class="alert alert-danger shadow error-card">


                        <h4 class="alert-heading fw-bold">

                            ❌ Registration Failed

                        </h4>


                        <p>

                            Please fix the following errors:

                        </p>


                        <ul class="mb-0">


                            <?php foreach ($errors as $error) { ?>


                                <li>

                                    <?php echo htmlspecialchars($error); ?>

                                </li>


                            <?php } ?>


                        </ul>


                    </div>


                    <a href="index.php"
                       class="btn btn-primary">

                        ← Back to Registration Form

                    </a>



                <?php } else { ?>


                    <!-- Success Confirmation Card -->


                    <div class="card result-card shadow-lg">


                        <!-- Success Header -->


                        <div class="success-header">


                            <h2 class="fw-bold">

                                ✅ Registration Successful!

                            </h2>


                            <p class="mb-0">

                                Student details have been submitted successfully

                            </p>


                        </div>



                        <!-- Student Details -->


                        <div class="card-body p-4 p-md-5">


                            <!-- Profile Placeholder -->


                            <div class="profile-placeholder mb-3">

                                👤

                            </div>


                            <!-- Student Name -->


                            <h3 class="text-center fw-bold mb-4">

                                <?php echo htmlspecialchars($name); ?>

                            </h3>



                            <!-- Email -->


                            <div class="student-detail">

                                <strong>

                                    📧 Email:

                                </strong>

                                <?php echo htmlspecialchars($email); ?>

                            </div>



                            <!-- Branch -->


                            <div class="student-detail">

                                <strong>

                                    🎓 Branch:

                                </strong>

                                <?php echo htmlspecialchars($branch); ?>

                            </div>



                            <!-- Phone -->


                            <div class="student-detail">

                                <strong>

                                    📱 Phone:

                                </strong>

                                <?php echo htmlspecialchars($phone); ?>

                            </div>



                            <!-- Gender -->


                            <div class="student-detail">

                                <strong>

                                    👤 Gender:

                                </strong>

                                <?php echo htmlspecialchars($gender); ?>

                            </div>



                            <!-- Course -->


                            <div class="student-detail">

                                <strong>

                                    📚 Course:

                                </strong>

                                <?php echo htmlspecialchars($course); ?>

                            </div>



                            <!-- Address -->


                            <div class="student-detail">

                                <strong>

                                    📍 Address:

                                </strong>

                                <?php echo htmlspecialchars($address); ?>

                            </div>



                            <!-- Register Another Student -->


                            <a href="index.php"
                               class="btn btn-success w-100 mt-3">

                                Register Another Student

                            </a>


                        </div>


                    </div>


                <?php } ?>


            </div>


        </div>


    </div>



    <!-- Bootstrap JS -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


</body>


</html>