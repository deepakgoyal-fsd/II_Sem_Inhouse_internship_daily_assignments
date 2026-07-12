<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #dbeafe, #f3e8ff);
            min-height: 100vh;
        }

        .registration-card {
            border: none;
            border-radius: 20px;
            overflow: hidden;
        }

        .form-header {
            background: linear-gradient(135deg, #0d6efd, #6f42c1);
            color: white;
            text-align: center;
            padding: 30px;
        }

        .form-header h2 {
            font-weight: bold;
        }

        .profile-placeholder {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            background-color: #f8f9fa;
            border: 3px dashed #6c757d;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            font-size: 45px;
        }

        .form-control,
        .form-select {
            border-radius: 10px;
            padding: 10px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #6f42c1;
            box-shadow: 0 0 0 0.2rem rgba(111, 66, 193, 0.20);
        }

        .submit-btn {
            background: linear-gradient(135deg, #0d6efd, #6f42c1);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-size: 18px;
            font-weight: bold;
        }

        .submit-btn:hover {
            opacity: 0.9;
        }
    </style>

</head>

<body>

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card registration-card shadow-lg">

                    <!-- Header -->

                    <div class="form-header">

                        <h2>🎓 Student Registration System</h2>

                        <p class="mb-0">
                            Fill in your details to complete registration
                        </p>

                    </div>


                    <!-- Form Body -->

                    <div class="card-body p-4 p-md-5">

                        <form action="process.php"
                              method="POST"
                              enctype="multipart/form-data">


                            <!-- Profile Photo -->

                            <div class="text-center mb-4">

                                <div class="profile-placeholder mb-3">
                                    👤
                                </div>

                                <label for="photo" class="form-label fw-bold">
                                    Profile Photo
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


                            <hr class="my-4">


                            <div class="row">


                                <!-- Full Name -->

                                <div class="col-md-6 mb-3">

                                    <label for="name" class="form-label fw-bold">
                                        Full Name
                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           id="name"
                                           name="name"
                                           placeholder="Enter your full name">

                                </div>


                                <!-- Email -->

                                <div class="col-md-6 mb-3">

                                    <label for="email" class="form-label fw-bold">
                                        Email Address
                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           id="email"
                                           name="email"
                                           placeholder="Enter your email">

                                </div>


                                <!-- Branch -->

                                <div class="col-md-6 mb-3">

                                    <label for="branch" class="form-label fw-bold">
                                        Branch
                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           id="branch"
                                           name="branch"
                                           placeholder="Example: CSE">

                                </div>


                                <!-- Phone -->

                                <div class="col-md-6 mb-3">

                                    <label for="phone" class="form-label fw-bold">
                                        Phone Number
                                    </label>

                                    <input type="text"
                                           class="form-control"
                                           id="phone"
                                           name="phone"
                                           placeholder="Enter 10-digit phone number">

                                </div>

                            </div>


                            <!-- Gender -->

                            <div class="mb-3">

                                <label class="form-label fw-bold">
                                    Gender
                                </label>

                                <br>

                                <div class="form-check form-check-inline">

                                    <input class="form-check-input"
                                           type="radio"
                                           name="gender"
                                           id="male"
                                           value="Male">

                                    <label class="form-check-label" for="male">
                                        Male
                                    </label>

                                </div>


                                <div class="form-check form-check-inline">

                                    <input class="form-check-input"
                                           type="radio"
                                           name="gender"
                                           id="female"
                                           value="Female">

                                    <label class="form-check-label" for="female">
                                        Female
                                    </label>

                                </div>


                                <div class="form-check form-check-inline">

                                    <input class="form-check-input"
                                           type="radio"
                                           name="gender"
                                           id="other"
                                           value="Other">

                                    <label class="form-check-label" for="other">
                                        Other
                                    </label>

                                </div>

                            </div>


                            <!-- Course -->

                            <div class="mb-3">

                                <label for="course" class="form-label fw-bold">
                                    Course
                                </label>

                                <select class="form-select"
                                        id="course"
                                        name="course">

                                    <option value="">
                                        Select your course
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


                            <!-- Address -->

                            <div class="mb-4">

                                <label for="address" class="form-label fw-bold">
                                    Address
                                </label>

                                <textarea class="form-control"
                                          id="address"
                                          name="address"
                                          rows="4"
                                          placeholder="Enter your complete address"></textarea>

                            </div>


                            <!-- Submit Button -->

                            <button type="submit"
                                    class="btn btn-primary text-white w-100 submit-btn">

                                Register Student

                            </button>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>


    <!-- Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>