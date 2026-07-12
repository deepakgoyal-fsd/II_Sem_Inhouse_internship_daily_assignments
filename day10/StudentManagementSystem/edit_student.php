<?php
require_once 'config/db_connect.php';
$pageTitle = 'Edit Student';

$id = (int) ($_GET['id'] ?? 0);
if ($id <= 0) {
    header('Location: index.php');
    exit;
}

$stmt = mysqli_prepare($conn, 'SELECT * FROM students WHERE id = ?');
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$student = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$student) {
    header('Location: index.php');
    exit;
}

require 'includes/header.php';
?>

<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card card-soft">
      <div class="card-body p-4 p-md-5">
        <div class="d-flex justify-content-between align-items-start mb-4">
          <h4 class="mb-0"><i class="fa-solid fa-pen me-2 text-primary"></i>Edit Student</h4>
          <span class="small text-muted">
            <i class="fa-regular fa-clock me-1"></i>Last Updated: <?php echo h(date('M j, Y g:i A', strtotime($student['updated_at']))); ?>
          </span>
        </div>

        <form action="update_student.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
          <input type="hidden" name="id" value="<?php echo (int) $student['id']; ?>">

          <div class="d-flex align-items-center mb-4 gap-3">
            <div class="student-photo-placeholder" style="width:90px;height:90px;font-size:2rem;">
              <?php if (!empty($student['photo']) && file_exists('assets/uploads/' . $student['photo'])): ?>
                <img id="photoPreview" src="assets/uploads/<?php echo h($student['photo']); ?>" alt="Preview" class="photo-preview-lg" style="width:90px;height:90px;">
                <i class="fa-solid fa-camera d-none" id="photoPlaceholderIcon"></i>
              <?php else: ?>
                <i class="fa-solid fa-camera" id="photoPlaceholderIcon"></i>
                <img id="photoPreview" src="#" alt="Preview" class="d-none photo-preview-lg" style="width:90px;height:90px;">
              <?php endif; ?>
            </div>
            <div class="flex-grow-1">
              <label for="photo" class="form-label fw-semibold mb-1">Profile Photo</label>
              <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
              <div class="form-text">Upload a new photo to replace the current one, or leave blank to keep it.</div>
            </div>
          </div>

          <div class="row g-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="name" name="name" required value="<?php echo h($student['name']); ?>">
              <div class="invalid-feedback">Please enter the student's name.</div>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" id="email" name="email" required value="<?php echo h($student['email']); ?>">
              <div class="invalid-feedback">Please enter a valid email.</div>
            </div>
            <div class="col-md-4">
              <label for="cgpa" class="form-label">CGPA (0.0&ndash;10.0) <span class="text-danger">*</span></label>
              <input type="number" step="0.01" min="0" max="10" class="form-control" id="cgpa" name="cgpa" required value="<?php echo h($student['cgpa']); ?>">
              <div class="invalid-feedback">CGPA must be between 0.0 and 10.0.</div>
            </div>
            <div class="col-md-4">
              <label for="branch" class="form-label">Branch <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="branch" name="branch" required value="<?php echo h($student['branch']); ?>">
              <div class="invalid-feedback">Please enter a branch.</div>
            </div>
            <div class="col-md-4">
              <label for="course" class="form-label">Course</label>
              <input type="text" class="form-control" id="course" name="course" value="<?php echo h($student['course']); ?>">
            </div>
            <div class="col-md-8">
              <label for="college" class="form-label">College <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="college" name="college" required value="<?php echo h($student['college']); ?>">
              <div class="invalid-feedback">Please enter a college name.</div>
            </div>
            <div class="col-md-4">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" name="status">
                <option value="Active" <?php echo $student['status'] === 'Active' ? 'selected' : ''; ?>>Active</option>
                <option value="Inactive" <?php echo $student['status'] === 'Inactive' ? 'selected' : ''; ?>>Inactive</option>
              </select>
            </div>
            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <textarea class="form-control" id="address" name="address" rows="2"><?php echo h($student['address']); ?></textarea>
            </div>
          </div>

          <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-primary">
              <i class="fa-solid fa-floppy-disk me-2"></i>Save Changes
            </button>
            <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php require 'includes/footer.php'; ?>
