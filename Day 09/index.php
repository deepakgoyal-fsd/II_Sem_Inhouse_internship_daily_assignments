<?php
$page = "home";
include 'header.php';
?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-lg border-0">
            <div class="card-header gradient-header text-center py-3">
                <h4 class="mb-0"><i class="fas fa-user-plus"></i> New Student Registration</h4>
            </div>
            <div class="card-body p-4">
                <form method="POST" action="process.php" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="form-label fw-bold text-muted">Profile Photo</label>
                        <input type="file" name="photo" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted">Full Name</label>
                            <input type="text" name="student_name" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted">Email Address</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted">CGPA</label>
                            <input type="number" step="0.1" name="cgpa" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-bold text-muted">College Name</label>
                            <input type="text" name="college" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold d-block text-muted">Gender</label>
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
                        <label class="form-label fw-bold text-muted">Branch/Course</label>
                        <select name="course" class="form-select">
                            <option value="">Select Branch...</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Information Technology">Information Technology</option>
                            <option value="Electronics & Communication">Electronics & Communication</option>
                            <option value="Mechanical Engineering">Mechanical Engineering</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label fw-bold text-muted">Address</label>
                        <textarea name="address" class="form-control" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 py-2 fs-5"><i class="fas fa-paper-plane"></i> Submit Registration</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>