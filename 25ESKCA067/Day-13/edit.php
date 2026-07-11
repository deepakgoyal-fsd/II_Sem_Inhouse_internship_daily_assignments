<?php include 'auth.php'; ?>
<?php
$page = "students";
include 'header.php';
include 'db_connect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$sql = "SELECT * FROM students WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("<div class='alert alert-danger'><i class='fas fa-exclamation-triangle'></i> Student not found.</div>");
}

$student = mysqli_fetch_assoc($result);
$imgSrc = !empty($student['photo']) && file_exists('uploads/' . $student['photo']) ? 'uploads/' . $student['photo'] : 'https://via.placeholder.com/150';
?>

<div class="row justify-content-center fade-in">
    <div class="col-lg-8">
        <div class="glass-card shadow-lg border-0 bg-white">
            <div class="bg-primary text-white text-center py-4 rounded-top">
                <i class="fas fa-user-edit fa-3x mb-2"></i>
                <h4 class="mb-0 fw-bold">Edit Student Profile</h4>
            </div>
            <div class="p-4 p-md-5">
                <form action="process_edit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $id ?>">
                    
                    <div class="row text-center mb-4">
                        <div class="col-12">
                            <img id="preview-img" src="<?= $imgSrc ?>" alt="Preview" class="rounded-circle shadow-sm border mb-3" width="120" height="120" style="object-fit:cover;">
                            <br>
                            <label class="btn btn-outline-primary btn-sm shadow-sm fw-bold">
                                <i class="fas fa-camera me-1"></i> Update Photo
                                <input type="file" name="photo" class="d-none" accept="image/jpeg, image/png, image/gif" onchange="previewImg(this)">
                            </label>
                            <div class="small text-muted mt-2">Max size: 2MB. JPG, PNG, GIF allowed. Leave empty to keep current photo.</div>
                        </div>
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted fw-bold small">Full Name</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-user text-muted"></i></span>
                                <input type="text" name="student_name" class="form-control border-start-0" value="<?= htmlspecialchars($student['name']) ?>" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted fw-bold small">Email Address</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-envelope text-muted"></i></span>
                                <input type="email" name="email" class="form-control border-start-0" value="<?= htmlspecialchars($student['email']) ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted fw-bold small">Current CGPA</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-star-half-alt text-muted"></i></span>
                                <input type="number" step="0.01" name="cgpa" class="form-control border-start-0" value="<?= htmlspecialchars($student['cgpa']) ?>" min="0" max="10" required>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted fw-bold small">Branch/Course</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-graduation-cap text-muted"></i></span>
                                <select name="college" class="form-select border-start-0" required>
                                    <?php
                                    $branches = ["Computer Science", "Information Technology", "Electronics", "Mechanical", "Civil"];
                                    foreach ($branches as $b) {
                                        $sel = ($student['branch'] == $b) ? 'selected' : '';
                                        echo "<option value='{$b}' {$sel}>{$b}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6 mb-3">
                            <label class="form-label text-muted fw-bold small">Gender</label>
                            <div class="d-flex bg-white px-3 py-2 border rounded shadow-sm">
                                <div class="form-check me-4">
                                    <input class="form-check-input" type="radio" name="gender" value="Male" id="gM" <?= ($student['gender'] == 'Male') ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="gM">Male</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gender" value="Female" id="gF" <?= ($student['gender'] == 'Female') ? 'checked' : '' ?> required>
                                    <label class="form-check-label" for="gF">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label text-muted fw-bold small">Status</label>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-light border-end-0"><i class="fas fa-user-check text-muted"></i></span>
                                <select name="status" class="form-select border-start-0" required>
                                    <option value="Active" <?= ($student['status'] == 'Active') ? 'selected' : '' ?>>Active</option>
                                    <option value="Inactive" <?= ($student['status'] == 'Inactive') ? 'selected' : '' ?>>Inactive</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label text-muted fw-bold small">Address</label>
                        <div class="input-group shadow-sm">
                            <span class="input-group-text bg-light border-end-0"><i class="fas fa-map-marker-alt text-muted"></i></span>
                            <textarea name="address" class="form-control border-start-0" rows="3" required><?= htmlspecialchars($student['address']) ?></textarea>
                        </div>
                    </div>
                    <div class="d-grid mt-4 d-flex gap-2">
                        <button type="submit" class="btn btn-primary py-3 fs-5 shadow fw-bold flex-grow-1"><i class="fas fa-save me-2"></i> Update Profile</button>
                        <a href="students.php" class="btn btn-outline-secondary py-3 fs-5 shadow-sm fw-bold">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
function previewImg(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-img').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
<?php include 'footer.php'; ?>
