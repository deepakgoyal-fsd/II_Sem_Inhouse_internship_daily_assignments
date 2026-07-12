<?php
require_once 'includes/require_login.php';
require_once 'config/db_connect.php';
$pageTitle = 'Dashboard';

$totalStudents = 0;
$avgCgpa = 0;
$newThisWeek = 0;
$recentStudents = [];

$totalResult = mysqli_query($conn, 'SELECT COUNT(*) AS total FROM students');
if ($totalResult) {
    $totalStudents = mysqli_fetch_assoc($totalResult)['total'];
}

$avgResult = mysqli_query($conn, 'SELECT AVG(cgpa) AS avg_cgpa FROM students');
if ($avgResult) {
    $avgCgpa = mysqli_fetch_assoc($avgResult)['avg_cgpa'];
}

// "Added This Week" stat card
$weekResult = mysqli_query($conn, 'SELECT COUNT(*) AS cnt FROM students WHERE date_registered >= NOW() - INTERVAL 7 DAY');
if ($weekResult) {
    $newThisWeek = mysqli_fetch_assoc($weekResult)['cnt'];
}

// Recent Registrations widget — last 5 students added
$recentResult = mysqli_query($conn, 'SELECT name, branch, course, photo, date_registered FROM students ORDER BY date_registered DESC LIMIT 5');
if ($recentResult) {
    while ($row = mysqli_fetch_assoc($recentResult)) {
        $recentStudents[] = $row;
    }
}

require 'includes/header.php';
?>

<div class="card card-soft mb-4 fade-in">
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
  <div class="col-md-4">
    <div class="stat-card total fade-in">
      <div class="small text-uppercase opacity-75">Total Students</div>
      <div class="fs-2 fw-bold"><i class="fa-solid fa-users me-2"></i><?php echo (int) $totalStudents; ?></div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="stat-card avg fade-in">
      <div class="small text-uppercase opacity-75">Average CGPA</div>
      <div class="fs-2 fw-bold"><i class="fa-solid fa-chart-line me-2"></i><?php echo $avgCgpa ? number_format($avgCgpa, 2) : '—'; ?></div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="stat-card branch fade-in">
      <div class="small text-uppercase opacity-75">Added This Week</div>
      <div class="fs-2 fw-bold"><i class="fa-solid fa-calendar-plus me-2"></i><?php echo (int) $newThisWeek; ?></div>
    </div>
  </div>
</div>

<div class="row g-3 mb-4">
  <div class="col-lg-8">
    <div class="card card-soft h-100 fade-in">
      <div class="card-body p-4 d-flex flex-wrap gap-3 align-items-start">
        <a href="index.php" class="btn btn-primary"><i class="fa-solid fa-table me-2"></i>Manage Students</a>
        <a href="add_student.php" class="btn btn-outline-primary"><i class="fa-solid fa-user-plus me-2"></i>Add Student</a>
        <a href="profile.php" class="btn btn-outline-secondary"><i class="fa-solid fa-id-badge me-2"></i>My Profile</a>
      </div>
    </div>
  </div>
  <div class="col-lg-4">
    <div class="card card-soft h-100 fade-in">
      <div class="card-body p-4">
        <h6 class="text-muted mb-3"><i class="fa-solid fa-clock-rotate-left me-2"></i>Recent Registrations</h6>
        <?php if (empty($recentStudents)): ?>
          <p class="text-muted small mb-0">No students registered yet.</p>
        <?php else: ?>
          <ul class="list-unstyled mb-0">
            <?php foreach ($recentStudents as $r): ?>
              <li class="d-flex align-items-center gap-2 mb-2">
                <?php if (!empty($r['photo']) && file_exists('assets/uploads/' . $r['photo'])): ?>
                  <img src="assets/uploads/<?php echo h($r['photo']); ?>" class="student-photo" alt="<?php echo h($r['name']); ?>">
                <?php else: ?>
                  <img src="assets/img/default-avatar.svg" class="student-photo" alt="<?php echo h($r['name']); ?>">
                <?php endif; ?>
                <div class="small">
                  <div class="fw-semibold"><?php echo h($r['name']); ?></div>
                  <div class="text-muted"><?php echo h($r['branch']); ?><?php echo $r['course'] ? ' &middot; ' . h($r['course']) : ''; ?></div>
                </div>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<?php require 'includes/footer.php'; ?>
