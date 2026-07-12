<?php

include('db_connect.php');


if ($_SERVER["REQUEST_METHOD"] != "POST") {

    header("Location: index.php");

    exit();

}


// RECEIVE POST DATA

$name = trim($_POST["name"] ?? "");

$email = trim($_POST["email"] ?? "");

$branch = trim($_POST["branch"] ?? "");

$cgpa = trim($_POST["cgpa"] ?? "");

$gender = trim($_POST["gender"] ?? "");

$course = trim($_POST["course"] ?? "");

$address = trim($_POST["address"] ?? "");


// ERROR ARRAY

$errors = [];


// REQUIRED FIELD VALIDATION

if (empty($name)) {

    $errors[] = "Name is required.";

}

if (empty($email)) {

    $errors[] = "Email is required.";

}

if (empty($branch)) {

    $errors[] = "Branch is required.";

}

if ($cgpa === "") {

    $errors[] = "CGPA is required.";

}

if (empty($gender)) {

    $errors[] = "Gender selection is required.";

}

if (empty($course)) {

    $errors[] = "Course selection is required.";

}

if (empty($address)) {

    $errors[] = "Address is required.";

}


// NAME VALIDATION

if (
    !empty($name) &&
    preg_match("/[0-9]/", $name)
) {

    $errors[] = "Name cannot contain numbers.";

}


// EMAIL VALIDATION

if (
    !empty($email) &&
    !filter_var($email, FILTER_VALIDATE_EMAIL)
) {

    $errors[] = "Please enter a valid email address.";

}


// CGPA VALIDATION

if (
    $cgpa !== "" &&
    (
        !is_numeric($cgpa) ||
        $cgpa < 0 ||
        $cgpa > 10
    )
) {

    $errors[] = "CGPA must be between 0 and 10.";

}


// ADDRESS VALIDATION

if (
    !empty($address) &&
    strlen($address) < 10
) {

    $errors[] = "Address must contain at least 10 characters.";

}


// DUPLICATE EMAIL VALIDATION

if (empty($errors)) {

    $safeEmail = mysqli_real_escape_string(
        $conn,
        $email
    );

    $checkEmail = "SELECT id
                   FROM students
                   WHERE email = '$safeEmail'";

    $emailResult = mysqli_query(
        $conn,
        $checkEmail
    );

    if (mysqli_num_rows($emailResult) > 0) {

        $errors[] = "This email is already registered.";

    }

}


// DISPLAY ALL ERRORS TOGETHER

if (!empty($errors)) {

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Registration Error</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>

        body {
            background: linear-gradient(135deg, #eef2ff, #e0f2fe);
            min-height: 100vh;
        }

        .error-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }

        .error-header {
            background: linear-gradient(135deg, #7f1d1d, #dc3545);
            color: white;
            text-align: center;
            padding: 35px;
        }

    </style>

</head>

<body>


<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card error-card shadow-lg">


                <div class="error-header">

                    <i class="fa-solid fa-circle-exclamation fa-3x mb-3"></i>

                    <h2 class="fw-bold">
                        Registration Failed
                    </h2>

                    <p class="mb-0">
                        Please correct the following details
                    </p>

                </div>


                <div class="card-body p-5">

                    <div class="alert alert-danger">

                        <h5 class="fw-bold">

                            <i class="fa-solid fa-triangle-exclamation me-2"></i>

                            Validation Errors

                        </h5>

                        <ul class="mb-0">

                            <?php foreach ($errors as $error) { ?>

                                <li>

                                    <?php echo htmlspecialchars($error); ?>

                                </li>

                            <?php } ?>

                        </ul>

                    </div>


                    <a href="index.php"
                       class="btn btn-primary w-100">

                        <i class="fa-solid fa-arrow-left me-2"></i>

                        Back to Registration

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>


</body>

</html>

<?php

    exit();

}


// SANITIZE DATA

$safeName = mysqli_real_escape_string(
    $conn,
    $name
);

$safeEmail = mysqli_real_escape_string(
    $conn,
    $email
);

$safeBranch = mysqli_real_escape_string(
    $conn,
    $branch
);

$safeGender = mysqli_real_escape_string(
    $conn,
    $gender
);

$safeCourse = mysqli_real_escape_string(
    $conn,
    $course
);

$safeAddress = mysqli_real_escape_string(
    $conn,
    $address
);


// INSERT STUDENT INTO MYSQL

$sql = "INSERT INTO students
        (
            name,
            email,
            branch,
            cgpa,
            gender,
            course,
            address
        )

        VALUES

        (
            '$safeName',
            '$safeEmail',
            '$safeBranch',
            '$cgpa',
            '$safeGender',
            '$safeCourse',
            '$safeAddress'
        )";


if (mysqli_query($conn, $sql)) {

    $studentId = mysqli_insert_id($conn);

    header(
        "Location: confirmation.php?id="
        . $studentId
    );

    exit();

}
else {

    die(
        "Database Error: "
        . mysqli_error($conn)
    );

}

?>