<?php include 'auth.php'; ?>
<?php
$page = "students";
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

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$course_filter = isset($_GET['course_filter']) ? trim($_GET['course_filter']) : '';
$status_filter = isset($_GET['status_filter']) ? trim($_GET['status_filter']) : 'All';

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

function highlightKeyword($text, $keyword) {
    if (empty($keyword)) return htmlspecialchars($text);
    return preg_replace('/(' . preg_quote($keyword, '/') . ')/i', '<span class="highlight">' . htmlspecialchars('$1') . '</span>', htmlspecialchars($text));
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="fw-bold mb-0 text-secondary"><i class="fas fa-users me-2"></i> Student Roster</h3>
    <a href="add.php" class="btn btn-primary shadow-sm fw-bold"><i class="fas fa-plus me-1"></i> Add Student</a>
</div>

<div class="glass-card p-4 mb-4 shadow-sm border-0">
    <form method="GET" action="students.php" class="row g-3 align-items-end">
        <div class="col-md-4">
            <label class="form-label text-muted small fw-bold">Search (Name, Email, Branch)</label>
            <div class="input-group shadow-sm">
                <span class="input-group-text bg-white border-end-0"><i class="fas fa-search text-muted"></i></span>
                <input type="text" name="search" class="form-control border-start-0" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
            </div>
        </div>
        <div class="col-md-3">
            <label class="form-label text-muted small fw-bold">Filter by Branch</label>
            <select name="course_filter" class="form-select shadow-sm">
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
            <select name="status_filter" class="form-select shadow-sm">
                <option value="All" <?= $status_filter === 'All' ? 'selected' : '' ?>>All Statuses</option>
                <option value="Active" <?= $status_filter === 'Active' ? 'selected' : '' ?>>Active Only</option>
                <option value="Inactive" <?= $status_filter === 'Inactive' ? 'selected' : '' ?>>Inactive Only</option>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary w-100 shadow-sm fw-bold"><i class="fas fa-filter me-1"></i> Apply</button>
        </div>
    </form>
</div>

<div class="glass-card p-0 table-custom shadow-sm border-0">
    <div class="d-flex justify-content-between align-items-center p-3 border-bottom bg-white">
        <h5 class="mb-0 fw-bold text-secondary"><i class="fas fa-list me-2"></i> Directory</h5>
        <span class="badge bg-primary py-2 px-3 fs-6 rounded-pill shadow-sm">Showing <?= mysqli_num_rows($result) ?> records</span>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped align-middle mb-0 border-0">
            <thead class="table-light">
                <tr>
                    <th class="px-4 py-3 text-muted text-uppercase small">ID</th>
                    <th class="py-3 text-muted text-uppercase small">Photo</th>
                    <th class="py-3 text-muted text-uppercase small">Name</th>
                    <th class="py-3 text-muted text-uppercase small">Email</th>
                    <th class="py-3 text-muted text-uppercase small">Branch</th>
                    <th class="py-3 text-muted text-uppercase small">CGPA</th>
                    <th class="py-3 text-muted text-uppercase small">Status</th>
                    <th class="text-center py-3 text-muted text-uppercase small">Actions</th>
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
                        echo "<td class='px-4 fw-bold text-muted'>#{$id}</td>";
                        echo "<td><img src='{$img}' alt='Photo' class='rounded-circle shadow-sm border' width='45' height='45' style='object-fit: cover;'></td>";
                        echo "<td class='fw-bold text-dark'>" . highlightKeyword($row['name'], $search) . "</td>";
                        echo "<td class='text-muted'>" . highlightKeyword($row['email'], $search) . "</td>";
                        echo "<td><span class='badge bg-info text-dark shadow-sm'>" . highlightKeyword($row['branch'], $search) . "</span></td>";
                        echo "<td class='fw-bold text-primary'>" . highlightKeyword($row['cgpa'], $search) . "</td>";
                        echo "<td><span class='badge {$statusBadge} shadow-sm'>" . htmlspecialchars($row['status']) . "</span></td>";
                        echo "<td class='text-center'>
                                <a href='edit.php?id={$id}' class='btn btn-sm btn-outline-primary me-1 shadow-sm' title='Edit'><i class='fas fa-pencil-alt'></i></a>
                                <a href='delete.php?id={$id}' class='btn btn-sm btn-outline-danger shadow-sm' title='Delete' onclick='return confirm(\"Are you sure you want to delete this record? This action cannot be undone.\");'><i class='fas fa-trash-alt'></i></a>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='text-center py-5'>
                          <i class='fas fa-search fa-3x text-muted mb-3 opacity-25'></i>
                          <h5 class='text-muted fw-bold'>No students found matching your criteria.</h5>
                          </td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>