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
$recentWeek = 0;

$statsQuery = mysqli_query($conn, "SELECT COUNT(*) as total, AVG(cgpa) as avg_cgpa, SUM(CASE WHEN status='Active' THEN 1 ELSE 0 END) as active FROM students");
if ($statsQuery) {
    $stats = mysqli_fetch_assoc($statsQuery);
    $totalStudents = $stats['total'];
    $avgCgpa = round($stats['avg_cgpa'] ?? 0, 2);
    $activeStudents = $stats['active'] ?? 0;
}

$recentQuery = mysqli_query($conn, "SELECT COUNT(*) as recent FROM students WHERE created_at >= DATE_SUB(NOW(), INTERVAL 7 DAY)");
if ($recentQuery) {
    $recentStats = mysqli_fetch_assoc($recentQuery);
    $recentWeek = $recentStats['recent'];
}

$recentStudents = mysqli_query($conn, "SELECT * FROM students ORDER BY id DESC LIMIT 5");
?>

<div class="row mb-4 fade-in">
    <div class="col-12">
        <div class="glass-card p-4 bg-primary text-white shadow-sm mb-2" style="background: linear-gradient(135deg, #3b82f6 0%, #1e40af 100%);">
            <h2 class="fw-bold mb-1">Welcome back, <?= htmlspecialchars($_SESSION['user_name'] ?? 'Admin') ?>! 👋</h2>
            <p class="mb-0 text-white-50 fw-bold"><i class="fas fa-clock me-2"></i> Session started at <?= htmlspecialchars($_SESSION['login_time'] ?? date('g:i A')) ?></p>
        </div>
    </div>
</div>

<div class="row mb-4 fade-in" style="animation-delay: 0.1s;">
    <div class="col-md-3 mb-3 mb-md-0">
        <div class="glass-card stat-card p-4 d-flex align-items-center h-100 border-start border-4 border-primary shadow-sm">
            <div class="fs-1 text-primary me-4"><i class="fas fa-users"></i></div>
            <div>
                <h6 class="text-muted mb-0 text-uppercase fw-bold">Total Enrolled</h6>
                <h2 class="mb-0 fw-bold text-dark"><?= $totalStudents ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3 mb-md-0">
        <div class="glass-card stat-card p-4 d-flex align-items-center h-100 border-start border-4 border-warning shadow-sm">
            <div class="fs-1 text-warning me-4"><i class="fas fa-calendar-plus"></i></div>
            <div>
                <h6 class="text-muted mb-0 text-uppercase fw-bold">New This Week</h6>
                <h2 class="mb-0 fw-bold text-dark"><?= $recentWeek ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3 mb-md-0">
        <div class="glass-card stat-card p-4 d-flex align-items-center h-100 border-start border-4 border-info shadow-sm">
            <div class="fs-1 text-info me-4"><i class="fas fa-star"></i></div>
            <div>
                <h6 class="text-muted mb-0 text-uppercase fw-bold">Average CGPA</h6>
                <h2 class="mb-0 fw-bold text-dark"><?= $avgCgpa ?></h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="glass-card stat-card p-4 d-flex align-items-center h-100 border-start border-4 border-success shadow-sm">
            <div class="fs-1 text-success me-4"><i class="fas fa-user-check"></i></div>
            <div>
                <h6 class="text-muted mb-0 text-uppercase fw-bold">Active Students</h6>
                <h2 class="mb-0 fw-bold text-dark"><?= $activeStudents ?></h2>
            </div>
        </div>
    </div>
</div>

<div class="row fade-in" style="animation-delay: 0.2s;">
    <div class="col-lg-8 mb-4">
        <div class="glass-card p-0 table-custom shadow-sm border-0 h-100">
            <div class="d-flex justify-content-between align-items-center p-4 border-bottom bg-white">
                <h5 class="mb-0 fw-bold text-secondary"><i class="fas fa-history me-2"></i> Recent Registrations</h5>
                <a href="students.php" class="btn btn-sm btn-outline-primary fw-bold shadow-sm">View All</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 border-0">
                    <thead class="table-light">
                        <tr>
                            <th class="px-4 py-3 text-muted text-uppercase small">Student</th>
                            <th class="py-3 text-muted text-uppercase small">Branch</th>
                            <th class="py-3 text-muted text-uppercase small">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($recentStudents) > 0): ?>
                            <?php while ($row = mysqli_fetch_assoc($recentStudents)): ?>
                                <?php 
                                $img = !empty($row['photo']) && file_exists("uploads/" . $row['photo']) ? "uploads/" . $row['photo'] : "https://via.placeholder.com/40"; 
                                $statusBadge = ($row['status'] === 'Active') ? 'bg-success' : 'bg-secondary';
                                ?>
                                <tr>
                                    <td class="px-4 py-3">
                                        <div class="d-flex align-items-center">
                                            <img src="<?= $img ?>" class="rounded-circle shadow-sm border me-3" width="40" height="40" style="object-fit:cover;">
                                            <div>
                                                <div class="fw-bold text-dark"><?= htmlspecialchars($row['name']) ?></div>
                                                <div class="small text-muted"><?= htmlspecialchars($row['email']) ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-3"><span class="badge bg-info text-dark shadow-sm"><?= htmlspecialchars($row['branch']) ?></span></td>
                                    <td class="py-3"><span class="badge <?= $statusBadge ?> shadow-sm"><?= htmlspecialchars($row['status']) ?></span></td>
                                </tr>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <tr><td colspan="3" class="text-center py-4 text-muted">No students registered yet.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4 mb-4">
        <div class="glass-card p-5 text-center shadow-sm h-100 d-flex flex-column justify-content-center">
            <i class="fas fa-user-plus fa-4x text-primary mb-4"></i>
            <h4 class="text-secondary fw-bold">Enroll New Student</h4>
            <p class="text-muted mb-4">Register a new student into the portal.</p>
            <a href="add.php" class="btn btn-primary btn-lg w-100 shadow-sm fw-bold"><i class="fas fa-plus me-2"></i> Register Student</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
