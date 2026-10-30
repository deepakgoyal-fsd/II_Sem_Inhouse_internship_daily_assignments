<?php
$page = "dashboard";
include 'header.php';
include 'db_connect.php';

session_start();
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

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$course_filter = isset($_GET['course_filter']) ? trim($_GET['course_filter']) : '';
$status_filter = isset($_GET['status_filter']) ? trim($_GET['status_filter']) : 'Active';

$where_clauses = [];
if ($status_filter !== 'All') {
    $where_clauses[] = "status = '" . mysqli_real_escape_string($conn, $status_filter) . "'";
}
if ($course_filter !== '') {
    $where_clauses[] = "branch = '" . mysqli_real_escape_string($conn, $course_filter) . "'";
}
if ($search !== '') {
    $s = mysqli_real_escape_string($conn, $search);
    $where_clauses[] = "(name LIKE '%$s%' OR email LIKE '%$s%' OR branch LIKE '%$s%' OR cgpa LIKE '%$s%')";
}

$where_sql = count($where_clauses) > 0 ? "WHERE " . implode(' AND ', $where_clauses) : "";
$sql = "SELECT * FROM students $where_sql ORDER BY id DESC";
$result = mysqli_query($conn, $sql);

$totalStudents = 0;
$avgCgpa = 0.0;
$statsQuery = mysqli_query($conn, "SELECT COUNT(*) as total, AVG(cgpa) as avg_cgpa FROM students");
if ($statsQuery) {
    $stats = mysqli_fetch_assoc($statsQuery);
    $totalStudents = $stats['total'];
    $avgCgpa = round($stats['avg_cgpa'] ?? 0, 2);
}

function highlightKeyword($text, $keyword) {
    if (empty($keyword)) return htmlspecialchars($text);
    return preg_replace('/(' . preg_quote($keyword, '/') . ')/i', '<span class="highlight">$1</span>', htmlspecialchars($text));
}
?>

<div class="row mb-4">
    <div class="col-md-6">
        <div class="glass-card stat-card p-3 d-flex align-items-center">
            <div class="fs-1 text-primary me-3"><i class="fas fa-users"></i></div>
            <div>
                <h6 class="text-muted mb-0 text-uppercase">Total Students</h6>
                <h3 class="mb-0 fw-bold"><?= $totalStudents ?></h3>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="glass-card stat-card p-3 d-flex align-items-center border-left-info" style="border-left-color: #0dcaf0;">
            <div class="fs-1 text-info me-3"><i class="fas fa-star"></i></div>
            <div>
                <h6 class="text-muted mb-0 text-uppercase">Average CGPA</h6>
                <h3 class="mb-0 fw-bold"><?= $avgCgpa ?></h3>
            </div>
        </div>
    </div>
</div>

<div class="glass-card p-4 mb-4">
    <form method="GET" action="index.php" class="row g-3 align-items-end">
        <div class="col-md-4">
            <label class="form-label text-muted small fw-bold">Search (Name, Email, Branch, CGPA)</label>
            <div class="input-group">
                <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
                <input type="text" name="search" class="form-control" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label text-muted small fw-bold">Filter by Branch</label>
            <select name="course_filter" class="form-select">
                <option value="">All Branches</option>
                <?php
                $branches = mysqli_query($conn, "SELECT DISTINCT branch FROM students WHERE branch != ''");
                while ($b = mysqli_fetch_assoc($branches)) {
                    $selected = ($course_filter === $b['branch']) ? 'selected' : '';
                    echo "<option value='" . htmlspecialchars($b['branch']) . "' $selected>" . htmlspecialchars($b['branch']) . "</option>";
                }
                ?>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label text-muted small fw-bold">Student Status</label>
            <select name="status_filter" class="form-select">
                <option value="All" <?= $status_filter === 'All' ? 'selected' : '' ?>>All Statuses</option>
                <option value="Active" <?= $status_filter === 'Active' ? 'selected' : '' ?>>Active Only</option>
                <option value="Inactive" <?= $status_filter === 'Inactive' ? 'selected' : '' ?>>Inactive Only</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter"></i> Apply</button>
        </div>
    </form>
</div>

<div class="glass-card p-0 table-custom">
    <div class="d-flex justify-content-between align-items-center p-3 border-bottom bg-white">
        <h5 class="mb-0 fw-bold"><i class="fas fa-list"></i> Student Roster</h5>
        <span class="badge bg-secondary py-2 px-3 fs-6">Showing <?= mysqli_num_rows($result) ?> records</span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped table-bordered align-middle mb-0">
            <thead>
                <tr>
                    <th class="px-3">ID</th>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Branch</th>
                    <th>CGPA</th>
                    <th>Status</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $img = !empty($row['photo']) && file_exists("uploads/" . $row['photo']) ? "uploads/" . $row['photo'] : "https://via.placeholder.com/40";
                        $statusBadge = ($row['status'] === 'Active') ? 'bg-success' : 'bg-secondary';
                        
                        echo "<tr>";
                        echo "<td class='px-3 fw-bold text-muted'>#{$id}</td>";
                        echo "<td><img src='{$img}' alt='Photo' class='rounded-circle shadow-sm' width='40' height='40' style='object-fit: cover;'></td>";
                        echo "<td class='fw-bold'>" . highlightKeyword($row['name'], $search) . "</td>";
                        echo "<td>" . highlightKeyword($row['email'], $search) . "</td>";
                        echo "<td><span class='badge bg-info text-dark'>" . highlightKeyword($row['branch'], $search) . "</span></td>";
                        echo "<td class='fw-bold text-primary'>" . highlightKeyword($row['cgpa'], $search) . "</td>";
                        echo "<td><span class='badge {$statusBadge}'>" . htmlspecialchars($row['status']) . "</span></td>";
                        echo "<td class='text-center'>
                                <a href='edit.php?id={$id}' class='btn btn-sm btn-outline-primary me-1' title='Edit'><i class='fas fa-pencil-alt'></i></a>
                                <a href='delete.php?id={$id}' class='btn btn-sm btn-outline-danger' title='Delete' onclick='return confirm(\"Are you sure you want to delete this record? This action cannot be undone.\");'><i class='fas fa-trash-alt'></i></a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center py-5'>
                          <i class='fas fa-search fa-3x text-muted mb-3 opacity-25'></i>
                          <h5 class='text-muted'>No students found matching your criteria.</h5>
                          </td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>