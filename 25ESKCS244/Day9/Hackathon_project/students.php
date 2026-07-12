<?php

include('db_connect.php');


// Fetch all students from database

$sql = "SELECT * FROM students
        ORDER BY id DESC";


$result = mysqli_query($conn, $sql);


// Count total student records

$totalStudents = mysqli_num_rows($result);

?>


<!DOCTYPE html>

<html lang="en">


<head>


    <meta charset="UTF-8">


    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">


    <title>Student Records</title>


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


        .student-card {

            border: none;

            border-radius: 20px;

            overflow: hidden;

        }


        .table-header {

            background: linear-gradient(135deg, #071952, #0d6efd);

            color: white;

            padding: 30px;

        }


        .counter-box {

            background-color: #e0f2fe;

            border-left: 4px solid #0d6efd;

            border-radius: 10px;

            padding: 15px;

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


        <a href="index.php"
           class="btn btn-light btn-sm fw-bold">


            Register Student


        </a>


    </div>


</nav>



<!-- Student Records -->

<div class="container py-5">


    <div class="card student-card shadow-lg">



        <!-- Table Header -->

        <div class="table-header">


            <div class="d-flex
                        justify-content-between
                        align-items-center
                        flex-wrap
                        gap-3">


                <div>


                    <h2 class="fw-bold mb-1">


                        Student Records


                    </h2>


                    <p class="mb-0">


                        All registered students from the MySQL database


                    </p>


                </div>



                <!-- Student Counter -->

                <span class="badge bg-light text-primary fs-6 p-3">


                    Total: <?php echo $totalStudents; ?> students


                </span>


            </div>


        </div>



        <!-- Table Body -->

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


                                <th>CGPA</th>


                            </tr>


                        </thead>



                        <tbody>



                            <?php while ($row = mysqli_fetch_assoc($result)) { ?>



                                <?php


                                // Highlight top CGPA students


                                if ($row["cgpa"] > 8.0) {


                                    $rowClass = "table-success";


                                }


                                else {


                                    $rowClass = "";


                                }


                                ?>



                                <tr class="<?php echo $rowClass; ?>">



                                    <!-- Student ID -->

                                    <td>


                                        <?php echo $row["id"]; ?>


                                    </td>



                                    <!-- Student Name -->

                                    <td>


                                        <?php echo htmlspecialchars($row["name"]); ?>


                                    </td>



                                    <!-- Email -->

                                    <td>


                                        <?php echo htmlspecialchars($row["email"]); ?>


                                    </td>



                                    <!-- Branch -->

                                    <td>


                                        <span class="badge bg-primary">


                                            <?php echo htmlspecialchars($row["branch"]); ?>


                                        </span>


                                    </td>



                                    <!-- CGPA -->

                                    <td>


                                        <strong>


                                            <?php echo $row["cgpa"]; ?>


                                        </strong>



                                        <?php if ($row["cgpa"] > 8.0) { ?>


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



                <!-- Record Counter -->

                <div class="counter-box mt-4">


                    <h5 class="mb-0 fw-bold">


                        📊 Total Students:
                        <?php echo $totalStudents; ?>


                    </h5>


                </div>



            <?php } else { ?>



                <!-- Empty Database Message -->

                <div class="alert alert-info text-center">


                    No student records found.
                    Register your first student!


                </div>


            <?php } ?>


        </div>


    </div>


</div>



<!-- Bootstrap JavaScript -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


</body>


</html>