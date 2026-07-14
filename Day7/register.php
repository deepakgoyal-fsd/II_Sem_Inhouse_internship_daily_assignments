<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-primary text-white text-center">
                    <h2 class="h4 mb-0">Student Registration Form</h2>
                </div>
                <div class="card-body">
                    <form action="process.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input id="name" type="text" class="form-control" name="name" placeholder="Enter your full name" required>
                        </div>
                        <div class="mb-3">
                            <label for="college" class="form-label">College Name</label>
                            <input id="college" type="text" class="form-control" name="college" placeholder="Enter your college name" required>
                        </div>
                        <div class="mb-3">
                            <label for="branch" class="form-label">Branch</label>
                            <input id="branch" type="text" class="form-control" name="branch" placeholder="Enter your branch" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input id="email" type="email" class="form-control" name="email" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number</label>
                            <input id="phone" type="tel" class="form-control" name="phone" placeholder="Enter your phone number" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block">Gender</label>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" required>
                                <label class="form-check-label" for="genderMale">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female">
                                <label class="form-check-label" for="genderFemale">Female</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="genderOther" value="Other">
                                <label class="form-check-label" for="genderOther">Other</label>
                            </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>