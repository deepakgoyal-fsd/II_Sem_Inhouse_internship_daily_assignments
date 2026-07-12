<?php

include('db_connect.php');


$sql = "SELECT *
        FROM students
        ORDER BY id DESC";


$result = mysqli_query(
    $conn,
    $sql
);


$totalStudents = mysqli_num_rows(
    $result
);

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Registered Students</title>

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

        .navbar-custom {
            background: linear-gradient(135deg, #071952, #0d6efd);
        }

        .student-card {
            border: none;
            border-radius: 22px;
            overflow: hidden;
        }

        .page-header {
            background: linear-gradient(135deg, #071952, #0d6efd);
            color: white;
            padding: 35px;
        }

    </style>

</head>

<body>


<!-- NAVBAR -->

<nav class="navbar navbar-dark navbar-custom shadow">

    <div class="container">

        <a class="navbar-brand fw-bold"
           href="index.php">

            <i class="fa-solid fa-graduation-cap me-2"></i>

            Student Registration Portal

        </a>

        <a href="index.php"
           class="btn btn-light btn-sm fw-bold">

            <i class="fa-solid fa-user-plus me-1"></i>

            Register Student

        </a>

    </div>

</nav>


<!-- STUDENT RECORDS -->

<div class="container py-5">

    <div class="card student-card shadow-lg">


        <!-- PAGE HEADER -->

        <div class="page-header">

            <div class="d-flex
                        justify-content-between
                        align-items-center
                        flex-wrap
                        gap-3">

                <div>

                    <h2 class="fw-bold">

                        <i class="fa-solid fa-users me-2"></i>

                        Registered Students

                    </h2>

                    <p class="mb-0">

                        Student records stored in MySQL

                    </p>

                </div>


                <!-- STUDENT COUNTER -->

                <span class="badge bg-light text-primary fs-6 p-3">

                    Total:
                    <?php echo $totalStudents; ?>
                    Students

                </span>

            </div>

        </div>


        <!-- TABLE -->

        <div class="card-body p-4">


            <?php if ($totalStudents > 0) { ?>


                <div class="table-responsive">

                    <table class="table
                                  table-bordered
                                  table-hover
                                  align-middle">

                        <thead class="table-dark">

                            <tr>

                                <th>ID</th>

                                <th>Name</th>

                                <th>Email</th>

                                <th>Branch</th>

                                <th>Course</th>

                                <th>Gender</th>

                                <th>CGPA</th>

                            </tr>

                        </thead>


                        <tbody>


                            <?php
                            while (
                                $row = mysqli_fetch_assoc($result)
                            ) {
                            ?>


                                <?php

                                $rowClass = "";

                                if ($row["cgpa"] > 8.0) {

                                    $rowClass = "table-success";

                                }

                                ?>


                                <tr class="<?php echo $rowClass; ?>">


                                    <!-- ID -->

                                    <td>

                                        <?php echo $row["id"]; ?>

                                    </td>


                                    <!-- NAME -->

                                    <td>

                                        <?php
                                        echo htmlspecialchars(
                                            $row["name"]
                                        );
                                        ?>

                                    </td>


                                    <!-- EMAIL -->

                                    <td>

                                        <?php
                                        echo htmlspecialchars(
                                            $row["email"]
                                        );
                                        ?>

                                    </td>


                                    <!-- BRANCH -->

                                    <td>

                                        <span class="badge bg-primary">

                                            <?php
                                            echo htmlspecialchars(
                                                $row["branch"]
                                            );
                                            ?>

                                        </span>

                                    </td>


                                    <!-- COURSE -->

                                    <td>

                                        <?php
                                        echo htmlspecialchars(
                                            $row["course"]
                                        );
                                        ?>

                                    </td>


                                    <!-- GENDER -->

                                    <td>

                                        <?php
                                        echo htmlspecialchars(
                                            $row["gender"]
                                        );
                                        ?>

                                    </td>


                                    <!-- CGPA -->

                                    <td>

                                        <strong>

                                            <?php echo $row["cgpa"]; ?>

                                        </strong>


                                        <?php
                                        if ($row["cgpa"] > 8.0) {
                                        ?>

                                            <span class="badge bg-success ms-1">

                                                Top CGPA

                                            </span>

                                        <?php } ?>

                                    </td>


                                </tr>


                            <?php } ?>


                        </tbody>

                    </table>

                </div>


            <?php } else { ?>


                <div class="alert alert-info text-center">

                    <i class="fa-solid fa-circle-info me-2"></i>

                    No students registered yet.

                </div>


            <?php } ?>


        </div>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>