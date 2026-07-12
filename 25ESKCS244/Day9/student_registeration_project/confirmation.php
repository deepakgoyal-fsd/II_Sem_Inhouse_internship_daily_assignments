<?php

include('db_connect.php');


$studentId = $_GET["id"] ?? "";


if (
    empty($studentId) ||
    !is_numeric($studentId)
) {

    header("Location: index.php");

    exit();

}


$studentId = (int)$studentId;


$sql = "SELECT *
        FROM students
        WHERE id = $studentId";


$result = mysqli_query(
    $conn,
    $sql
);


if (mysqli_num_rows($result) == 0) {

    die("Student record not found.");

}


$student = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Registration Confirmation</title>

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <!-- Font Awesome -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <style>

        body {
            background: linear-gradient(135deg, #eef2ff, #e0f2fe);
            min-height: 100vh;
        }

        .confirmation-card {
            border: none;
            border-radius: 22px;
            overflow: hidden;
        }

        .confirmation-header {
            background: linear-gradient(135deg, #071952, #0d6efd);
            color: white;
            padding: 45px;
            text-align: center;
        }

        .profile-placeholder {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background-color: #eef2ff;
            color: #0d6efd;

            display: flex;
            justify-content: center;
            align-items: center;

            margin: auto;

            font-size: 50px;
        }

        .detail-card {
            background-color: #f8f9fa;
            border-left: 4px solid #0d6efd;
            border-radius: 10px;
            padding: 14px;
            margin-bottom: 12px;
        }

    </style>

</head>

<body>


<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card confirmation-card shadow-lg">


                <!-- GRADIENT CONFIRMATION HEADER -->

                <div class="confirmation-header">

                    <i class="fa-solid fa-circle-check fa-4x mb-3"></i>

                    <h1 class="fw-bold">

                        Registration Successful!

                    </h1>

                    <p class="mb-0">

                        Welcome to the Student Registration Portal

                    </p>

                </div>


                <div class="card-body p-4 p-md-5">


                    <!-- PROFILE PLACEHOLDER -->

                    <div class="text-center mb-4">

                        <div class="profile-placeholder mb-3">

                            <i class="fa-solid fa-user-graduate"></i>

                        </div>

                        <h2 class="fw-bold">

                            <?php
                            echo htmlspecialchars(
                                $student["name"]
                            );
                            ?>

                        </h2>

                        <span class="badge bg-success fs-6">

                            <i class="fa-solid fa-check me-1"></i>

                            Registered Student

                        </span>

                    </div>


                    <h4 class="fw-bold mb-4">

                        <i class="fa-solid fa-id-card me-2 text-primary"></i>

                        Student Details

                    </h4>


                    <!-- EMAIL -->

                    <div class="detail-card">

                        <strong>

                            <i class="fa-solid fa-envelope me-2 text-primary"></i>

                            Email:

                        </strong>

                        <?php
                        echo htmlspecialchars(
                            $student["email"]
                        );
                        ?>

                    </div>


                    <!-- BRANCH -->

                    <div class="detail-card">

                        <strong>

                            <i class="fa-solid fa-code-branch me-2 text-primary"></i>

                            Branch:

                        </strong>

                        <?php
                        echo htmlspecialchars(
                            $student["branch"]
                        );
                        ?>

                    </div>


                    <!-- CGPA -->

                    <div class="detail-card">

                        <strong>

                            <i class="fa-solid fa-chart-line me-2 text-primary"></i>

                            CGPA:

                        </strong>

                        <?php echo $student["cgpa"]; ?>


                        <?php if ($student["cgpa"] > 8.0) { ?>

                            <span class="badge bg-success ms-2">

                                Top Performer

                            </span>

                        <?php } ?>

                    </div>


                    <!-- GENDER -->

                    <div class="detail-card">

                        <strong>

                            <i class="fa-solid fa-venus-mars me-2 text-primary"></i>

                            Gender:

                        </strong>

                        <?php
                        echo htmlspecialchars(
                            $student["gender"]
                        );
                        ?>

                    </div>


                    <!-- COURSE -->

                    <div class="detail-card">

                        <strong>

                            <i class="fa-solid fa-book-open me-2 text-primary"></i>

                            Course:

                        </strong>

                        <?php
                        echo htmlspecialchars(
                            $student["course"]
                        );
                        ?>

                    </div>


                    <!-- ADDRESS -->

                    <div class="detail-card">

                        <strong>

                            <i class="fa-solid fa-location-dot me-2 text-primary"></i>

                            Address:

                        </strong>

                        <?php
                        echo htmlspecialchars(
                            $student["address"]
                        );
                        ?>

                    </div>


                    <!-- BUTTONS -->

                    <div class="d-grid gap-2 mt-4">

                        <a href="students.php"
                           class="btn btn-primary">

                            <i class="fa-solid fa-users me-2"></i>

                            View All Students

                        </a>

                        <a href="index.php"
                           class="btn btn-outline-dark">

                            <i class="fa-solid fa-user-plus me-2"></i>

                            Register Another Student

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>