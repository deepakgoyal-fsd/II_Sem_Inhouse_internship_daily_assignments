<?php include 'auth.php'; ?>
<?php
$page = "dashboard";
include 'header.php';
include 'db_connect.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM students WHERE id = $id");
if (mysqli_num_rows($query) == 0) {
    header("Location: index.php");
    exit();
}
$student = mysqli_fetch_assoc($query);
?>
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="glass-card overflow-hidden">
            <div class="bg-warning text-dark p-4 text-center">
                <h3 class="mb-0"><i class="fas fa-user-edit"></i> Edit Student Record</h3>
            </div>
            <div class="p-4 p-md-5">
                <form method="POST" action="process_edit.php" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $student['id'] ?>">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Full Name</label>
                            <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($student['name']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Email Address</label>
                            <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($student['email']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Branch / Department</label>
                            <input type="text" name="branch" class="form-control" value="<?= htmlspecialchars($student['branch']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">CGPA (0.0 - 10.0)</label>
                            <input type="number" step="0.01" min="0" max="10" name="cgpa" class="form-control" value="<?= htmlspecialchars($student['cgpa']) ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Update Profile Photo (Optional)</label>
                            <input type="file" name="photo" class="form-control" accept="image/*">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small text-muted">Status</label>
                            <select name="status" class="form-select">
                                <option value="Active" <?= ($student['status'] == 'Active') ? 'selected' : '' ?>>Active</option>
                                <option value="Inactive" <?= ($student['status'] == 'Inactive') ? 'selected' : '' ?>>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4 text-center">
                        <p class="text-muted small"><i class="far fa-clock"></i> Last Updated: <?= date('M j, Y h:i A', strtotime($student['updated_at'])) ?></p>
                    </div>
                    <div class="mt-2 d-flex gap-2">
                        <button type="submit" class="btn btn-warning w-50 py-2 fw-bold"><i class="fas fa-save"></i> Update Record</button>
                        <a href="index.php" class="btn btn-outline-secondary w-50 py-2 fw-bold">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>