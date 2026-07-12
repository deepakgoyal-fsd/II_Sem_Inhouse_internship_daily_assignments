<?php
require_once 'includes/require_login.php';
require_once 'config/db_connect.php';
$pageTitle = 'Add Student';
require 'includes/header.php';
?>

<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card card-soft">
      <div class="card-body p-4 p-md-5">
        <h4 class="mb-4"><i class="fa-solid fa-user-plus me-2 text-primary"></i>Add New Student</h4>

        <form action="store_student.php" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>

          <div class="d-flex align-items-center mb-4 gap-3">
            <div class="student-photo-placeholder" style="width:90px;height:90px;font-size:2rem;">
              <i class="fa-solid fa-camera" id="photoPlaceholderIcon"></i>
              <img id="photoPreview" src="#" alt="Preview" class="d-none photo-preview-lg" style="width:90px;height:90px;">
            </div>
            <div class="flex-grow-1">
              <label for="photo" class="form-label fw-semibold mb-1">Profile Photo</label>
              <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
              <div class="form-text">Optional. Stored on the server and shown in the students table.</div>
            </div>
          </div>

          <div class="row g-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="name" name="name" required>
              <div class="invalid-feedback">Please enter the student's name.</div>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" id="email" name="email" required>
              <div class="invalid-feedback">Please enter a valid email.</div>
            </div>
            <div class="col-md-4">
              <label for="cgpa" class="form-label">CGPA (0.0&ndash;10.0) <span class="text-danger">*</span></label>
              <input type="number" step="0.01" min="0" max="10" class="form-control" id="cgpa" name="cgpa" required>
              <div class="invalid-feedback">CGPA must be between 0.0 and 10.0.</div>
            </div>
            <div class="col-md-4">
              <label for="branch" class="form-label">Branch <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="branch" name="branch" placeholder="e.g. CSE" required>
              <div class="invalid-feedback">Please enter a branch.</div>
            </div>
            <div class="col-md-4">
              <label for="course" class="form-label">Course</label>
              <input type="text" class="form-control" id="course" name="course" placeholder="e.g. B.Tech">
            </div>
            <div class="col-md-8">
              <label for="college" class="form-label">College <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="college" name="college" required>
              <div class="invalid-feedback">Please enter a college name.</div>
            </div>
            <div class="col-md-4">
              <label for="status" class="form-label">Status</label>
              <select class="form-select" id="status" name="status">
                <option value="Active" selected>Active</option>
                <option value="Inactive">Inactive</option>
              </select>
            </div>
            <div class="col-12">
              <label for="address" class="form-label">Address</label>
              <textarea class="form-control" id="address" name="address" rows="2"></textarea>
            </div>
          </div>

          <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-primary">
              <i class="fa-solid fa-floppy-disk me-2"></i>Save Student
            </button>
            <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php require 'includes/footer.php'; ?>
