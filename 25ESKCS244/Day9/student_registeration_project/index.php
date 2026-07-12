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

        .registration-card {
            border: none;
            border-radius: 22px;
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, #071952, #0d6efd);
            color: white;
            padding: 40px;
            text-align: center;
        }

        .photo-placeholder {
            width: 115px;
            height: 115px;
            border-radius: 50%;
            background-color: #eef2ff;
            border: 3px dashed #0d6efd;
            color: #0d6efd;

            display: flex;
            justify-content: center;
            align-items: center;

            margin: auto;

            font-size: 45px;
        }

        .section-title {
            color: #071952;
            font-weight: bold;
            border-bottom: 2px solid #e9ecef;
            padding-bottom: 10px;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 11px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #0d6efd;

            box-shadow:
            0 0 0 0.2rem rgba(13, 110, 253, 0.15);
        }

        .submit-btn {
            background: linear-gradient(135deg, #071952, #0d6efd);
            border: none;
            border-radius: 10px;
            padding: 13px;
            font-size: 18px;
            font-weight: bold;
        }

        .submit-btn:hover {
            opacity: 0.9;
        }

        .footer {
            background-color: #071952;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 50px;
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

        <a href="students.php"
           class="btn btn-light btn-sm fw-bold">

            <i class="fa-solid fa-users me-1"></i>

            View Students

        </a>

    </div>

</nav>


<!-- MAIN CONTENT -->

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="card registration-card shadow-lg">


                <!-- FORM HEADER -->

                <div class="form-header">

                    <i class="fa-solid fa-user-graduate fa-3x mb-3"></i>

                    <h1 class="fw-bold">
                        Student Registration
                    </h1>

                    <p class="mb-0">
                        Complete your student profile and join the portal
                    </p>

                </div>


                <!-- FORM -->

                <div class="card-body p-4 p-md-5">

                    <form action="process_form.php"
                          method="POST"
                          enctype="multipart/form-data">


                        <!-- PHOTO UPLOAD UI -->

                        <div class="text-center mb-5">

                            <div class="photo-placeholder mb-3">

                                <i class="fa-solid fa-user"></i>

                            </div>

                            <label for="photo"
                                   class="form-label fw-bold">

                                <i class="fa-solid fa-camera me-2 text-primary"></i>

                                Student Photo

                            </label>

                            <input type="file"
                                   class="form-control"
                                   id="photo"
                                   name="photo"
                                   accept="image/*">

                            <small class="text-muted">

                               Select a profile photo

                            </small>

                        </div>


                        <!-- STUDENT INFORMATION -->

                        <h4 class="section-title mb-4">

                            <i class="fa-solid fa-id-card me-2"></i>

                            Student Information

                        </h4>


                        <div class="row">


                            <!-- NAME -->

                            <div class="col-md-6 mb-3">

                                <label for="name"
                                       class="form-label fw-bold">

                                    <i class="fa-solid fa-user me-2 text-primary"></i>

                                    Full Name

                                </label>

                                <input type="text"
                                       class="form-control"
                                       id="name"
                                       name="name"
                                       placeholder="Enter full name">

                            </div>


                            <!-- EMAIL -->

                            <div class="col-md-6 mb-3">

                                <label for="email"
                                       class="form-label fw-bold">

                                    <i class="fa-solid fa-envelope me-2 text-primary"></i>

                                    Email Address

                                </label>

                                <input type="email"
                                       class="form-control"
                                       id="email"
                                       name="email"
                                       placeholder="Enter email address">

                            </div>


                            <!-- BRANCH -->

                            <div class="col-md-6 mb-3">

                                <label for="branch"
                                       class="form-label fw-bold">

                                    <i class="fa-solid fa-code-branch me-2 text-primary"></i>

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

                            <div class="col-md-6 mb-3">

                                <label for="cgpa"
                                       class="form-label fw-bold">

                                    <i class="fa-solid fa-chart-line me-2 text-primary"></i>

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

                        </div>


                        <!-- GENDER -->

                        <div class="mb-3">

                            <label class="form-label fw-bold">

                                <i class="fa-solid fa-venus-mars me-2 text-primary"></i>

                                Gender

                            </label>

                            <br>

                            <div class="form-check form-check-inline">

                                <input class="form-check-input"
                                       type="radio"
                                       name="gender"
                                       id="male"
                                       value="Male">

                                <label class="form-check-label"
                                       for="male">

                                    Male

                                </label>

                            </div>


                            <div class="form-check form-check-inline">

                                <input class="form-check-input"
                                       type="radio"
                                       name="gender"
                                       id="female"
                                       value="Female">

                                <label class="form-check-label"
                                       for="female">

                                    Female

                                </label>

                            </div>


                            <div class="form-check form-check-inline">

                                <input class="form-check-input"
                                       type="radio"
                                       name="gender"
                                       id="other"
                                       value="Other">

                                <label class="form-check-label"
                                       for="other">

                                    Other

                                </label>

                            </div>

                        </div>


                        <!-- COURSE -->

                        <div class="mb-3">

                            <label for="course"
                                   class="form-label fw-bold">

                                <i class="fa-solid fa-book-open me-2 text-primary"></i>

                                Course

                            </label>

                            <select class="form-select"
                                    id="course"
                                    name="course">

                                <option value="">
                                    Select Course
                                </option>

                                <option value="B.Tech">
                                    B.Tech
                                </option>

                                <option value="BCA">
                                    BCA
                                </option>

                                <option value="MCA">
                                    MCA
                                </option>

                                <option value="BBA">
                                    BBA
                                </option>

                                <option value="MBA">
                                    MBA
                                </option>

                            </select>

                        </div>


                        <!-- ADDRESS -->

                        <div class="mb-4">

                            <label for="address"
                                   class="form-label fw-bold">

                                <i class="fa-solid fa-location-dot me-2 text-primary"></i>

                                Address

                            </label>

                            <textarea class="form-control"
                                      id="address"
                                      name="address"
                                      rows="4"
                                      placeholder="Enter complete address"></textarea>

                        </div>


                        <!-- SUBMIT BUTTON -->

                        <button type="submit"
                                class="btn btn-primary text-white w-100 submit-btn">

                            <i class="fa-solid fa-paper-plane me-2"></i>

                            Complete Registration

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- FOOTER -->

<footer class="footer">

    <p class="mb-0">

        <i class="fa-solid fa-graduation-cap me-2"></i>

        Student Registration Portal | PHP, MySQL & Bootstrap

    </p>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>