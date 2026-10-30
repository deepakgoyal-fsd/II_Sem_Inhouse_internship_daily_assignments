<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Registration System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow border-0">

                <div class="card-header bg-primary text-white text-center">
                    <h2>🎓 Student Registration</h2>
                    <p class="mb-0">Enter Student Details</p>
                </div>

                <div class="card-body p-4">

                    <form action="confirmation.php"
                          method="POST"
                          enctype="multipart/form-data">

                        <!-- NAME -->

                        <div class="mb-3">
                            <label class="form-label">Student Name</label>

                            <input type="text"
                                   name="name"
                                   class="form-control"
                                   placeholder="Enter student name">
                        </div>


                        <!-- EMAIL -->

                        <div class="mb-3">
                            <label class="form-label">Email</label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Enter email">
                        </div>


                        <!-- PHONE -->

                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>

                            <input type="text"
                                   name="phone"
                                   class="form-control"
                                   placeholder="Enter phone number">
                        </div>


                        <!-- PHOTO -->

                        <div class="mb-3">

                            <label class="form-label">
                                Profile Photo
                            </label>

                            <input type="file"
                                   name="photo"
                                   class="form-control"
                                   accept="image/*">

                            <div class="form-text">
                                Upload JPG, PNG or JPEG profile photo.
                            </div>

                        </div>


                        <!-- PHOTO PLACEHOLDER -->

                        <div class="text-center mb-4">

                            <img
                                src="https://via.placeholder.com/120"
                                class="rounded-circle border shadow"
                                width="120"
                                height="120"
                                alt="Profile Placeholder">

                            <p class="text-muted mt-2">
                                Profile Photo Preview
                            </p>

                        </div>


                        <!-- GENDER -->

                        <div class="mb-3">

                            <label class="form-label d-block">
                                Gender
                            </label>

                            <div class="form-check form-check-inline">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="gender"
                                    value="Male">

                                <label class="form-check-label">
                                    Male
                                </label>

                            </div>


                            <div class="form-check form-check-inline">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="gender"
                                    value="Female">

                                <label class="form-check-label">
                                    Female
                                </label>

                            </div>


                            <div class="form-check form-check-inline">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="gender"
                                    value="Other">

                                <label class="form-check-label">
                                    Other
                                </label>

                            </div>

                        </div>


                        <!-- COURSE -->

                        <div class="mb-3">

                            <label class="form-label">
                                Course
                            </label>

                            <select name="course" class="form-select">

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

                                <option value="MBA">
                                    MBA
                                </option>

                                <option value="BBA">
                                    BBA
                                </option>

                            </select>

                        </div>


                        <!-- ADDRESS -->

                        <div class="mb-3">

                            <label class="form-label">
                                Address
                            </label>

                            <textarea
                                name="address"
                                class="form-control"
                                rows="4"
                                placeholder="Enter complete address"></textarea>

                        </div>


                        <!-- BUTTON -->

                        <div class="d-grid">

                            <button
                                type="submit"
                                class="btn btn-primary btn-lg">

                                Register Student

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

</body>
</html>