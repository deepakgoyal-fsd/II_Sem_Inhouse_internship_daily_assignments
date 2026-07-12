<?php

include('db_connect.php');

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Student Registration Portal</title>


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


        .registration-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }


        .form-header {
            background: linear-gradient(135deg, #071952, #0d6efd);
            color: white;
            padding: 35px;
            text-align: center;
        }


        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 12px;
        }


        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.20);
        }


        .register-btn {
            background: linear-gradient(135deg, #071952, #0d6efd);
            border: none;
            border-radius: 10px;
            padding: 13px;
            font-size: 18px;
            font-weight: bold;
        }


        .register-btn:hover {
            opacity: 0.9;
        }


        .information-box {
            background-color: #f0f9ff;
            border-left: 4px solid #0d6efd;
            border-radius: 10px;
            padding: 15px;
        }


        footer {
            background-color: #071952;
            color: white;
            padding: 20px;
            text-align: center;
            margin-top: 50px;
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



<!-- Main Content -->

<div class="container py-5">


    <div class="row justify-content-center">


        <div class="col-lg-8">


            <div class="card registration-card shadow-lg">


                <!-- Form Header -->

                <div class="form-header">


                    <h1 class="fw-bold">

                        Student Registration

                    </h1>


                    <p class="mb-0">

                        Register a new student in the portal

                    </p>


                </div>



                <!-- Form Body -->

                <div class="card-body p-4 p-md-5">


                    <div class="information-box mb-4">


                        <strong>

                            📌 Registration Information

                        </strong>


                        <p class="text-muted mb-0 mt-1">

                            Enter the student details below.
                            All fields are required.

                        </p>


                    </div>



                    <form action="process_form.php"
                          method="POST">



                        <!-- Name -->

                        <div class="mb-3">


                            <label for="name"
                                   class="form-label fw-bold">

                                Full Name

                            </label>


                            <input type="text"
                                   class="form-control"
                                   id="name"
                                   name="name"
                                   placeholder="Enter student name">


                        </div>



                        <!-- Email -->

                        <div class="mb-3">


                            <label for="email"
                                   class="form-label fw-bold">

                                Email Address

                            </label>


                            <input type="email"
                                   class="form-control"
                                   id="email"
                                   name="email"
                                   placeholder="Enter student email">


                        </div>



                        <!-- Branch -->

                        <div class="mb-3">


                            <label for="branch"
                                   class="form-label fw-bold">

                                Branch

                            </label>


                            <select class="form-select"
                                    id="branch"
                                    name="branch">


                                <option value="">

                                    Select Branch

                                </option>


                                <option value="CSE">

                                    Computer Science Engineering

                                </option>


                                <option value="IT">

                                    Information Technology

                                </option>


                                <option value="ECE">

                                    Electronics and Communication

                                </option>


                                <option value="EE">

                                    Electrical Engineering

                                </option>


                                <option value="ME">

                                    Mechanical Engineering

                                </option>


                                <option value="CE">

                                    Civil Engineering

                                </option>


                            </select>


                        </div>



                        <!-- CGPA -->

                        <div class="mb-4">


                            <label for="cgpa"
                                   class="form-label fw-bold">

                                CGPA

                            </label>


                            <input type="number"
                                   class="form-control"
                                   id="cgpa"
                                   name="cgpa"
                                   min="0"
                                   max="10"
                                   step="0.01"
                                   placeholder="Enter CGPA out of 10">


                        </div>



                        <!-- Submit Button -->

                        <button type="submit"
                                class="btn btn-primary text-white w-100 register-btn">

                            Register Student

                        </button>


                    </form>


                </div>


            </div>


        </div>


    </div>


</div>



<!-- Footer -->

<footer>

    <p class="mb-0">

        Student Registration Portal | PHP & MySQL Hackathon Project

    </p>

</footer>



<!-- Bootstrap JavaScript -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>