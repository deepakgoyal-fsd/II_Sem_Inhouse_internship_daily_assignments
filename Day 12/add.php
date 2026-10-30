<?php include 'auth.php'; ?>
<?php
$page = "add";
include 'header.php';
?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="glass-card overflow-hidden">
            <div class="bg-primary text-white p-4 text-center">
                <h3 class="mb-0"><i class="fas fa-user-plus"></i> Register New Student</h3>
            </div>
            <div class="p-4 p-md-5">
                <form method="POST" action="process_add.php" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Email Address</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Branch / Department</label>
                            <input type="text" name="branch" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">CGPA (0.0 - 10.0)</label>
                            <input type="number" step="0.01" min="0" max="10" name="cgpa" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Profile Photo</label>
                            <input type="file" name="photo" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Status</label>
                            <select name="status" class="form-select">
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary w-100 py-2 fs-5"><i class="fas fa-save"></i> Save Student Record</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>