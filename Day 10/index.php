<?php
$page = "register";
include 'header.php';
?>
<div class="container my-5 py-3">
    <?php include 'db_connect.php'; ?>
    <div class="row justify-content-center">
        <div class="col-lg-8 col-xl-7">
            <div class="glass-card">
                <div class="glass-header">
                    <h2 class="mb-1"><i class="fas fa-user-graduate"></i> Student Registration</h2>
                    <p class="mb-0 opacity-75">Join our academic database</p>
                </div>
                <div class="card-body p-4 p-md-5">
                    <form method="POST" action="process_form.php">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-id-badge text-muted"></i> Full Name</label>
                                <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-envelope text-muted"></i> Email Address</label>
                                <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-phone text-muted"></i> Phone Number</label>
                                <input type="text" name="phone" class="form-control" placeholder="+1 234 567 8900" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-city text-muted"></i> City</label>
                                <input type="text" name="city" class="form-control" placeholder="New York" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-book-open text-muted"></i> Course</label>
                                <select name="course" class="form-select" required>
                                    <option value="">Choose Course...</option>
                                    <option value="B.Tech Computer Science">B.Tech Computer Science</option>
                                    <option value="B.Tech IT">B.Tech IT</option>
                                    <option value="BBA">BBA</option>
                                    <option value="BCA">BCA</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-code-branch text-muted"></i> Branch</label>
                                <input type="text" name="branch" class="form-control" placeholder="e.g. AI & ML" required>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label fw-bold"><i class="fas fa-map-marker-alt text-muted"></i> Full Address</label>
                                <textarea name="address" class="form-control" rows="2" placeholder="123 Main St, Apt 4B" required></textarea>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-star text-muted"></i> CGPA</label>
                                <input type="number" step="0.01" name="cgpa" class="form-control" placeholder="9.50" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold"><i class="fas fa-camera text-muted"></i> Profile Photo (Name)</label>
                                <input type="text" name="photo" class="form-control" placeholder="profile_pic.jpg" required>
                            </div>
                        </div>
                        <div class="mt-5">
                            <button type="submit" class="btn btn-gradient w-100 py-3 fs-5"><i class="fas fa-save"></i> Save to Database</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>