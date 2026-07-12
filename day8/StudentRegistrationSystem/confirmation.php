<?php
session_start();
require_once 'includes/functions.php';

// Guard: no valid submission in session means nothing to confirm
if (empty($_SESSION['registration'])) {
    header('Location: index.php');
    exit;
}

$data = $_SESSION['registration'];
$submittedAt = $_SESSION['submitted_at'] ?? date('F j, Y \a\t g:i A');
$grade = calculateGrade($data['cgpa']);

$pageTitle = 'Confirmation';
require 'includes/header.php';
?>

<div class="row justify-content-center">
  <div class="col-lg-8">
    <div class="card card-soft overflow-hidden">

      <div class="confirmation-header text-center">
        <i class="fa-solid fa-circle-check fa-3x mb-3"></i>
        <h2 class="mb-1">Welcome, <?php echo h($data['name']); ?>!</h2>
        <p class="mb-0">Your registration was submitted successfully.</p>
      </div>

      <div class="card-body p-4 p-md-5">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <span class="badge bg-<?php echo $grade['class']; ?> fs-6 px-3 py-2">
            <i class="fa-solid <?php echo $grade['icon']; ?> me-2"></i><?php echo h($grade['label']); ?>
          </span>
          <span class="text-muted small">
            <i class="fa-regular fa-clock me-1"></i>Submitted on <?php echo h($submittedAt); ?>
          </span>
        </div>

        <h5 class="form-section-title mb-3"><i class="fa-solid fa-id-card me-2"></i>Basic Details</h5>
        <div class="detail-row d-flex"><div class="col-4 text-muted">Full Name</div><div class="col-8 fw-semibold"><?php echo h($data['name']); ?></div></div>
        <div class="detail-row d-flex"><div class="col-4 text-muted">Email</div><div class="col-8 fw-semibold"><?php echo h($data['email']); ?></div></div>
        <div class="detail-row d-flex"><div class="col-4 text-muted">CGPA</div><div class="col-8 fw-semibold"><?php echo h($data['cgpa']); ?></div></div>
        <div class="detail-row d-flex"><div class="col-4 text-muted">Branch</div><div class="col-8 fw-semibold"><?php echo h($data['branch']); ?></div></div>
        <div class="detail-row d-flex"><div class="col-4 text-muted">College</div><div class="col-8 fw-semibold"><?php echo h($data['college']); ?></div></div>

        <h5 class="form-section-title mt-4 mb-3"><i class="fa-solid fa-clipboard-list me-2"></i>Additional Details</h5>
        <div class="detail-row d-flex"><div class="col-4 text-muted">Gender</div><div class="col-8 fw-semibold"><?php echo h($data['gender']); ?></div></div>
        <div class="detail-row d-flex"><div class="col-4 text-muted">Course</div><div class="col-8 fw-semibold"><?php echo h($data['course']); ?></div></div>
        <div class="detail-row d-flex"><div class="col-4 text-muted">Address</div><div class="col-8 fw-semibold"><?php echo h($data['address']); ?></div></div>

        <div class="d-grid mt-4">
          <a href="index.php" class="btn btn-outline-primary">
            <i class="fa-solid fa-rotate-left me-2"></i>Submit Another Registration
          </a>
        </div>

      </div>
    </div>
  </div>
</div>

<?php require 'includes/footer.php'; ?>
