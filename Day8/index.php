<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Pro</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-lg border-0">

                <!-- Header -->

                <div class="card-header bg-gradient text-white text-center py-4">

                    <h2>
                        <i class="bi bi-mortarboard-fill"></i>
                        Student Registration Pro
                    </h2>

                    <span class="badge bg-warning text-dark mt-2">
                        Academic Registration Form
                    </span>

                </div>

                <!-- Body -->

                <div class="card-body p-4">

                    <!-- Error Box -->

                    <div id="errorBox" class="alert alert-danger d-none"></div>

                    <form id="studentForm"
                          action="process.php"
                          method="POST"
                          enctype="multipart/form-data">

                        <!-- Photo Upload -->

                        <div class="text-center mb-4">

                            <img src="images/user.png"
                                 id="preview"
                                 class="rounded-circle img-thumbnail"
                                 width="150"
                                 height="150">

                            <br><br>

                            <label class="form-label fw-bold">
                                Upload Student Photo
                            </label>

                            <input
                                type="file"
                                class="form-control"
                                id="photo"
                                name="photo"
                                accept="image/*">

                        </div>

                        <!-- Full Name -->

                        <div class="mb-3">

                            <label class="form-label">
                                Full Name
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                placeholder="Enter Full Name">

                        </div>

                        <!-- Email -->

                        <div class="mb-3">

                            <label class="form-label">
                                Email Address
                            </label>

                            <input
                                type="email"
                                class="form-control"
                                id="email"
                                name="email"
                                placeholder="Enter Email">

                        </div>

                        <!-- Phone -->

                        <div class="mb-3">

                            <label class="form-label">
                                Phone Number
                            </label>

                            <input
                                type="text"
                                class="form-control"
                                id="phone"
                                name="phone"
                                placeholder="10 Digit Mobile Number">

                        </div>

                        <!-- Gender -->

                        <div class="mb-3">

                            <label class="form-label d-block">
                                Gender
                            </label>

                            <div class="form-check form-check-inline">

                                <input class="form-check-input"
                                       type="radio"
                                       name="gender"
                                       value="Male">

                                <label class="form-check-label">
                                    Male
                                </label>

                            </div>

                            <div class="form-check form-check-inline">

                                <input class="form-check-input"
                                       type="radio"
                                       name="gender"
                                       value="Female">

                                <label class="form-check-label">
                                    Female
                                </label>

                            </div>

                            <div class="form-check form-check-inline">

                                <input class="form-check-input"
                                       type="radio"
                                       name="gender"
                                       value="Other">

                                <label class="form-check-label">
                                    Other
                                </label>

                            </div>

                        </div>

                        <!-- Course -->

                        <div class="mb-3">

                            <label class="form-label">
                                Select Course
                            </label>

                            <select
                                class="form-select"
                                id="course"
                                name="course">

                                <option value="">Choose Course</option>
                                <option>B.Tech CSE</option>
                                <option>B.Tech IT</option>
                                <option>BCA</option>
                                <option>B.Sc Computer Science</option>
                                <option>MCA</option>

                            </select>

                        </div>

                        <!-- Address -->

                        <div class="mb-3">

                            <label class="form-label">
                                Address
                            </label>

                            <textarea
                                class="form-control"
                                id="address"
                                name="address"
                                rows="4"
                                placeholder="Enter Full Address"></textarea>

                        </div>

                        <!-- Submit -->

                        <div class="d-grid">

                            <button
                                type="submit"
                                class="btn btn-primary btn-lg">

                                <i class="bi bi-check-circle-fill"></i>

                                Register Student

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<script src="script.js"></script>

</body>
</html>