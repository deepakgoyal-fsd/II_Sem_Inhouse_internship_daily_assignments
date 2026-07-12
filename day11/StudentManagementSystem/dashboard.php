<?php
require_once 'includes/require_login.php';
require_once 'config/db_connect.php';
$pageTitle = 'Dashboard';

$totalStudents = 0;
$avgCgpa = 0;

$totalResult = mysqli_query($conn, 'SELECT COUNT(*) AS total FROM students');
if ($totalResult) {
    $totalStudents = mysqli_fetch_assoc($totalResult)['total'];
}
$avgResult = mysqli_query($conn, 'SELECT AVG(cgpa) AS avg_cgpa FROM students');
if ($avgResult) {
    $avgCgpa = mysqli_fetch_assoc($avgResult)['avg_cgpa'];
}

require 'includes/header.php';
?>

<div class="card card-soft mb-4">
  <div class="card-body p-4 p-md-5">
    <h2 class="mb-1">Welcome back, <?php echo h($_SESSION['user_name']); ?>! <span>👋</span></h2>
    <p class="text-muted mb-0">
      <i class="fa-regular fa-clock me-1"></i>Last login: <?php echo h($_SESSION['last_login']); ?>
      &middot;
      <i class="fa-solid fa-hourglass-start me-1"></i>Session started at <?php echo h($_SESSION['session_started_at']); ?>
    </p>
  </div>
</div>

<div class="row g-3 mb-4">
  <div class="col-md-6">
    <div class="stat-card total">
      <div class="small text-uppercase opacity-75">Total Students</div>
      <div class="fs-2 fw-bold"><i class="fa-solid fa-users me-2"></i><?php echo (int) $totalStudents; ?></div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="stat-card avg">
      <div class="small text-uppercase opacity-75">Average CGPA</div>
      <div class="fs-2 fw-bold"><i class="fa-solid fa-chart-line me-2"></i><?php echo $avgCgpa ? number_format($avgCgpa, 2) : '—'; ?></div>
    </div>
  </div>
</div>

<div class="card card-soft">
  <div class="card-body p-4 d-flex flex-wrap gap-3">
    <a href="index.php" class="btn btn-primary"><i class="fa-solid fa-table me-2"></i>Manage Students</a>
    <a href="add_student.php" class="btn btn-outline-primary"><i class="fa-solid fa-user-plus me-2"></i>Add Student</a>
    <a href="profile.php" class="btn btn-outline-secondary"><i class="fa-solid fa-id-badge me-2"></i>My Profile</a>
  </div>
</div>

<?php require 'includes/footer.php'; ?>
