<?php 
$page = "home"; // Navbar link ko highlight karne ke liye variable
include 'header.php'; 
?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow border-0 rounded-3">
                <div class="card-header gradient-header text-white text-center py-4">
                    <h3 class="mb-1"><i class="fa-solid fa-user-plus me-2"></i>Student Registration System</h3>
                    <p class="mb-0 opacity-75">Day 8: Advanced Backend Confirmation System</p>
                </div>
                <div class="card-body p-4">
                    
                    <form method="POST" action="result.php">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Full Name</label>
                                <input type="text" name="student_name" class="form-control" placeholder="John Doe">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Email Address</label>
                                <input type="text" name="student_email" class="form-control" placeholder="john@example.com">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Phone Number</label>
                                <input type="text" name="student_phone" class="form-control" placeholder="10-digit number">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Current CGPA</label>
                                <input type="number" step="0.1" name="student_cgpa" class="form-control" placeholder="e.g. 8.5" min="0" max="10">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Branch / Course</label>
                                <select name="student_course" class="form-select">
                                    <option value="">-- Select Course --</option>
                                    <option value="Computer Science">Computer Science</option>
                                    <option value="Data Science">Data Science</option>
                                    <option value="Information Technology">Information Technology</option>
                                    <option value="Electronics">Electronics</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold d-block">Gender</label>
                                <div class="form-check form-check-inline mt-1">
                                    <input class="form-check-input" type="radio" name="student_gender" value="Male" id="male">
                                    <label class="form-check-label" for="male"><i class="fa-solid fa-mars text-primary me-1"></i>Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="student_gender" value="Female" id="female">
                                    <label class="form-check-label" for="female"><i class="fa-solid fa-venus text-danger me-1"></i>Female</label>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Profile Photo (UI Upload)</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                                <input type="file" name="student_photo" class="form-control">
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Permanent Address</label>
                            <textarea name="student_address" class="form-control" rows="3" placeholder="Enter complete address"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 btn-lg rounded-3 gradient-header border-0 shadow">
                            <i class="fa-solid fa-paper-plane me-2"></i>Process Registration
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>