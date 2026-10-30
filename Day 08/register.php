<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light p-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Student Registration System</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="process.php">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Profile Photo</label>
                                <input type="file" name="photo" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Full Name</label>
                                <input type="text" name="student_name" class="form-control" placeholder="Enter your full name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="Enter valid email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Phone Number (10 Digits)</label>
                                <input type="text" name="phone" class="form-control" placeholder="Enter 10 digit phone number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold d-block">Gender</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Male" id="genderMale">
                                    <label class="form-check-label" for="genderMale">Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="Female" id="genderFemale">
                                    <label class="form-check-label" for="genderFemale">Female</label>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Course</label>
                                <select name="course" class="form-select">
                                    <option value="">Select Course...</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Information Technology">Information Technology</option>
                                    <option value="Electronics">Electronics</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Address</label>
                                <textarea name="address" class="form-control" rows="3" placeholder="Enter full address"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100 py-2">Submit Registration</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>