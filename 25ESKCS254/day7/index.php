<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h3 class="mb-0">
                        Student Registration System
                    </h3>

                </div>

                <div class="card-body">

                    <form action="process.php" method="POST">

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Full Name
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    placeholder="Enter your full name"
                                    required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Email Address
                                </label>

                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    placeholder="example@gmail.com"
                                    required>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Branch
                                </label>

                                <input
                                    type="text"
                                    name="branch"
                                    class="form-control"
                                    placeholder="Computer Science"
                                    required>

                            </div>

                            <div class="col-md-6 mb-3">

                                <label class="form-label">
                                    Phone Number
                                </label>

                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    maxlength="10"
                                    placeholder="9876543210"
                                    required>

                            </div>

                        </div>

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

                        <div class="mb-3">

                            <label class="form-label">
                                Course
                            </label>

                            <select
                                name="course"
                                class="form-select"
                                required>

                                <option value="">
                                    Select Course
                                </option>

                                <option>
                                    Computer Science Engineering
                                </option>

                                <option>
                                    Information Technology
                                </option>

                                <option>
                                    Electronics Engineering
                                </option>

                                <option>
                                    Mechanical Engineering
                                </option>

                            </select>

                        </div>

                        <div class="mb-3">

                            <label class="form-label">
                                Address
                            </label>

                            <textarea
                                name="address"
                                rows="4"
                                class="form-control"
                                placeholder="Enter your address"
                                required></textarea>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Profile Photo
                            </label>

                            <input
                                type="file"
                                class="form-control">

                            <div class="form-text">
                                Upload feature will be added in the next assignment.
                            </div>

                        </div>

                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary">

                                Submit Registration

                            </button>

                            <button
                                type="reset"
                                class="btn btn-secondary">

                                Reset

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