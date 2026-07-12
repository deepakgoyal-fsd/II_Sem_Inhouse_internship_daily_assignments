<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container mt-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow-lg">

                <div class="card-header bg-primary text-white text-center">

                    <h2>
                        <i class="bi bi-person-plus-fill"></i>
                        Student Registration System
                    </h2>

                </div>

                <div class="card-body">

                    <form action="register.php" method="POST" id="studentForm">

                        <!-- Name -->

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
                                placeholder="Enter Mobile Number">

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
                                Course
                            </label>

                            <select
                                class="form-select"
                                id="course"
                                name="course">

                                <option value="">Select Course</option>

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
                                rows="4"
                                id="address"
                                name="address"
                                placeholder="Enter Address"></textarea>

                        </div>

                        <!-- Buttons -->

                        <div class="text-center">

                            <button
                                type="submit"
                                class="btn btn-primary">

                                <i class="bi bi-check-circle-fill"></i>

                                Register Student

                            </button>

                            <a
                                href="students.php"
                                class="btn btn-success">

                                <i class="bi bi-table"></i>

                                View Students

                            </a>

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