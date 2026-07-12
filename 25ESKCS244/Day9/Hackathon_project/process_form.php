<?php

include('db_connect.php');


$message = "";

$messageType = "danger";


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // Receive form data using POST

    $name = trim($_POST["name"] ?? "");

    $email = trim($_POST["email"] ?? "");

    $branch = trim($_POST["branch"] ?? "");

    $cgpa = trim($_POST["cgpa"] ?? "");



    // Server-side validation for empty fields

    if (
        empty($name) ||
        empty($email) ||
        empty($branch) ||
        $cgpa === ""
    ) {

        $message = "All fields are required.";

        $messageType = "danger";

    }


    // Email validation

    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $message = "Please enter a valid email address.";

        $messageType = "danger";

    }


    // CGPA validation

    elseif (!is_numeric($cgpa) || $cgpa < 0 || $cgpa > 10) {

        $message = "CGPA must be a number between 0 and 10.";

        $messageType = "danger";

    }


    else {


        // Sanitize input data

        $name = mysqli_real_escape_string($conn, $name);

        $email = mysqli_real_escape_string($conn, $email);

        $branch = mysqli_real_escape_string($conn, $branch);



        // Check duplicate email

        $checkEmail = "SELECT * FROM students
                       WHERE email = '$email'";


        $emailResult = mysqli_query($conn, $checkEmail);



        if (mysqli_num_rows($emailResult) > 0) {


            $message = "This email is already registered.";

            $messageType = "warning";


        }


        else {


            // Insert student into MySQL database

            $sql = "INSERT INTO students
                    (name, email, branch, cgpa)

                    VALUES

                    ('$name', '$email', '$branch', '$cgpa')";



            if (mysqli_query($conn, $sql)) {


                // Count total registered students

                $countQuery = "SELECT COUNT(*) AS total
                               FROM students";


                $countResult = mysqli_query(
                    $conn,
                    $countQuery
                );


                $countRow = mysqli_fetch_assoc(
                    $countResult
                );


                $totalStudents = $countRow["total"];



                $message = "Student Registered Successfully!
                            You are student #$totalStudents in our system!";


                $messageType = "success";


            }


            else {


                $message = "Database Error: "
                           . mysqli_error($conn);


                $messageType = "danger";


            }


        }


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

            background: linear-gradient(135deg, #e0f2fe, #eef2ff);

            min-height: 100vh;

        }


        .navbar-custom {

            background: linear-gradient(135deg, #071952, #0d6efd);

        }


        .result-card {

            border: none;

            border-radius: 20px;

            overflow: hidden;

        }


        .result-header {

            background: linear-gradient(135deg, #071952, #0d6efd);

            color: white;

            padding: 30px;

            text-align: center;

        }


    </style>


</head>


<body>



<!-- Professional Navbar -->

<nav class="navbar navbar-dark navbar-custom shadow">


    <div class="container">


        <a class="navbar-brand fw-bold"
           href="index.php">


            🎓 Student Registration Portal


        </a>


        <a href="students.php"
           class="btn btn-light btn-sm fw-bold">


            View Students


        </a>


    </div>


</nav>



<!-- Registration Result -->

<div class="container py-5">


    <div class="row justify-content-center">


        <div class="col-lg-7">


            <div class="card result-card shadow-lg">


                <div class="result-header">


                    <h2 class="fw-bold mb-0">


                        Registration Status


                    </h2>


                </div>



                <div class="card-body p-5 text-center">



                    <!-- Bootstrap Alert -->

                    <div class="alert alert-<?php echo $messageType; ?>"
                         role="alert">


                        <h5 class="mb-0">


                            <?php echo htmlspecialchars($message); ?>


                        </h5>


                    </div>



                    <div class="d-grid gap-2 mt-4">


                        <a href="index.php"
                           class="btn btn-primary">


                            Register Another Student


                        </a>


                        <a href="students.php"
                           class="btn btn-outline-dark">


                            View All Students


                        </a>


                    </div>


                </div>


            </div>


        </div>


    </div>


</div>



<!-- Bootstrap JavaScript -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


</body>


</html>