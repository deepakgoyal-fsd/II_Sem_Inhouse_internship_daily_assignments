<?php include 'auth.php'; ?>
<?php
$page = "dashboard";
include 'header.php';
include 'db_connect.php';

if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success alert-dismissible fade show alert-auto-dismiss shadow-sm" role="alert">
            <i class="fas fa-check-circle me-2"></i> ' . $_SESSION['success'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger alert-dismissible fade show alert-auto-dismiss shadow-sm" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i> ' . $_SESSION['error'] . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
    unset($_SESSION['error']);
}

$totalStudents = 0;
$avgCgpa = 0.0;
$activeStudents = 0;

$statsQuery = mysqli_query($conn, "SELECT COUNT(*) as total, AVG(cgpa) as avg_cgpa, SUM(CASE WHEN status='Active' THEN 1 ELSE 0 END) as active FROM students");
if ($statsQuery) {
    $stats = mysqli_fetch_assoc($statsQuery);
    $totalStudents = $stats['total'];
    $avgCgpa = round($stats['avg_cgpa'] ?? 0, 2);
    $activeStudents = $stats['active'] ?? 0;
}
?>

<div class="row mb-4">
    <div class="col-12">
        <div class="glass-card p-4 bg-primary text-white shadow-sm mb-2" style="background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);">
            <h2 class="fw-bold mb-1">Welcome back, <?= htmlspecialchars($_SESSION['user_name'] ?? 'Admin') ?>! 👋</h2>
            <p class="mb-0 text-white-50 fw-bold"><i class="fas fa-clock me-2"></i> Session started at <?= htmlspecialchars($_SESSION['login_time'] ?? date('g:i A')) ?></p>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-4 mb-3 mb-md-0">
        <div class="glass-card stat-card p-4 d-flex align-items-center h-100 border-start border-4 border-primary shadow-sm">
            <div class="fs-1 text-primary me-4"><i class="fas fa-users"></i></div>
            <div>
                <h6 class="text-muted mb-0 text-uppercase fw-bold">Total Enrolled</h6>
                <h2 class="mb-0 fw-bold text-dark"><?= $totalStudents ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3 mb-md-0">
        <div class="glass-card stat-card p-4 d-flex align-items-center h-100 border-start border-4 border-info shadow-sm">
            <div class="fs-1 text-info me-4"><i class="fas fa-star"></i></div>
            <div>
                <h6 class="text-muted mb-0 text-uppercase fw-bold">Average CGPA</h6>
                <h2 class="mb-0 fw-bold text-dark"><?= $avgCgpa ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="glass-card stat-card p-4 d-flex align-items-center h-100 border-start border-4 border-success shadow-sm">
            <div class="fs-1 text-success me-4"><i class="fas fa-user-check"></i></div>
            <div>
                <h6 class="text-muted mb-0 text-uppercase fw-bold">Active Students</h6>
                <h2 class="mb-0 fw-bold text-dark"><?= $activeStudents ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="glass-card p-5 text-center shadow-sm">
            <i class="fas fa-chart-pie fa-5x text-muted opacity-25 mb-4"></i>
            <h3 class="text-secondary fw-bold">Manage Your Students With Ease</h3>
            <p class="text-muted mb-4 fs-5">Use the sidebar navigation to view the full student roster, edit records, or register new students into the system.</p>
            <a href="students.php" class="btn btn-primary btn-lg px-4 me-2 shadow-sm fw-bold"><i class="fas fa-list me-2"></i> View Full Roster</a>
            <a href="add.php" class="btn btn-outline-primary btn-lg px-4 shadow-sm fw-bold"><i class="fas fa-plus me-2"></i> Add New Student</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>