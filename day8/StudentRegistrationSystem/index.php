<?php
session_start();
require_once 'includes/functions.php';

$pageTitle = 'Register';

// If there are old values/errors from a failed submission, repopulate the form
$old = $_SESSION['old_input'] ?? [];
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['old_input'], $_SESSION['errors']);

require 'includes/header.php';
?>

<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card card-soft">
      <div class="card-body p-4 p-md-5">
        <h2 class="mb-1"><i class="fa-solid fa-user-plus me-2 text-primary"></i>Student Registration</h2>
        <p class="text-muted mb-4">Fill in your details below. Fields marked with <span class="text-danger">*</span> are required.</p>

        <?php if (!empty($errors)): ?>
          <div class="alert alert-danger">
            <strong><i class="fa-solid fa-circle-exclamation me-1"></i>Please fix the following:</strong>
            <ul class="mb-0 mt-2">
              <?php foreach ($errors as $error): ?>
                <li><?php echo h($error); ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <form action="process.php" method="POST" class="needs-validation" novalidate>

          <!-- Photo upload (placeholder only, no server-side upload) -->
          <div class="d-flex align-items-center mb-4 gap-3">
            <div class="photo-placeholder">
              <i class="fa-solid fa-camera" id="photoPlaceholderIcon"></i>
              <img id="photoPreview" src="#" alt="Preview" class="d-none rounded-circle" style="width:110px;height:110px;object-fit:cover;">
            </div>
            <div>
              <label for="photo" class="form-label mb-1 fw-semibold">Profile Photo</label>
              <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
              <div class="form-text">Optional &mdash; shown as a live preview only, not stored on the server.</div>
            </div>
          </div>

          <h5 class="form-section-title mt-4 mb-3"><i class="fa-solid fa-id-card me-2"></i>Basic Details</h5>
          <div class="row g-3">
            <div class="col-md-6">
              <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="name" name="name" required value="<?php echo h($old['name'] ?? ''); ?>">
              <div class="invalid-feedback">Please enter your name.</div>
            </div>
            <div class="col-md-6">
              <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
              <input type="email" class="form-control" id="email" name="email" required value="<?php echo h($old['email'] ?? ''); ?>">
              <div class="invalid-feedback">Please enter a valid email.</div>
            </div>
            <div class="col-md-6">
              <label for="cgpa" class="form-label">CGPA (0&ndash;10) <span class="text-danger">*</span></label>
              <input type="number" step="0.01" min="0" max="10" class="form-control" id="cgpa" name="cgpa" required value="<?php echo h($old['cgpa'] ?? ''); ?>">
              <div class="invalid-feedback">Please enter a valid CGPA between 0 and 10.</div>
            </div>
            <div class="col-md-6">
              <label for="branch" class="form-label">Branch <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="branch" name="branch" placeholder="e.g. CSE" required value="<?php echo h($old['branch'] ?? ''); ?>">
              <div class="invalid-feedback">Please enter your branch.</div>
            </div>
            <div class="col-md-12">
              <label for="college" class="form-label">College <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="college" name="college" required value="<?php echo h($old['college'] ?? ''); ?>">
              <div class="invalid-feedback">Please enter your college name.</div>
            </div>
          </div>

          <h5 class="form-section-title mt-4 mb-3"><i class="fa-solid fa-clipboard-list me-2"></i>Additional Details</h5>
          <div class="row g-3">
            <div class="col-md-6">
              <label class="form-label d-block">Gender <span class="text-danger">*</span></label>
              <?php $genderOld = $old['gender'] ?? ''; ?>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderMale" value="Male" required <?php echo $genderOld === 'Male' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="genderMale">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="Female" <?php echo $genderOld === 'Female' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="genderFemale">Female</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="genderOther" value="Other" <?php echo $genderOld === 'Other' ? 'checked' : ''; ?>>
                <label class="form-check-label" for="genderOther">Other</label>
              </div>
            </div>
            <div class="col-md-6">
              <label for="course" class="form-label">Course <span class="text-danger">*</span></label>
              <?php $courseOld = $old['course'] ?? ''; ?>
              <select class="form-select" id="course" name="course" required>
                <option value="" disabled <?php echo $courseOld === '' ? 'selected' : ''; ?>>Choose...</option>
                <?php foreach (['B.Tech', 'B.Sc', 'BCA', 'M.Tech', 'MCA', 'Other'] as $c): ?>
                  <option value="<?php echo h($c); ?>" <?php echo $courseOld === $c ? 'selected' : ''; ?>><?php echo h($c); ?></option>
                <?php endforeach; ?>
              </select>
              <div class="invalid-feedback">Please select a course.</div>
            </div>
            <div class="col-md-12">
              <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
              <textarea class="form-control" id="address" name="address" rows="3" required><?php echo h($old['address'] ?? ''); ?></textarea>
              <div class="invalid-feedback">Please enter your address.</div>
            </div>
          </div>

          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary btn-lg">
              <i class="fa-solid fa-paper-plane me-2"></i>Submit Registration
            </button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<?php require 'includes/footer.php'; ?>
