<?php
require_once 'includes/require_login.php';
require_once 'config/db_connect.php';

$pageTitle = 'Dashboard';

$status = $_GET['status_msg'] ?? '';

// ---------- Filters (Multi-Field Search + Course Filter + Status Filter) ----------
$quickSearch  = trim($_GET['quick_search'] ?? '');
$searchName   = trim($_GET['search_name'] ?? '');
$searchEmail  = trim($_GET['search_email'] ?? '');
$filterBranch = trim($_GET['filter_branch'] ?? '');
$filterCourse = trim($_GET['filter_course'] ?? '');
$cgpaMin      = trim($_GET['cgpa_min'] ?? '');
$cgpaMax      = trim($_GET['cgpa_max'] ?? '');
$showAll      = isset($_GET['show_all']); // if not set, default to Active-only

// ---------- Build dynamic WHERE clause safely with prepared statements ----------
$conditions = [];
$params     = [];
$types      = '';

if ($quickSearch !== '') {
    // Search across name, branch, and course simultaneously in one query
    $conditions[] = '(name LIKE ? OR branch LIKE ? OR course LIKE ?)';
    $like = '%' . $quickSearch . '%';
    $params[] = $like;
    $params[] = $like;
    $params[] = $like;
    $types   .= 'sss';
}
if ($searchName !== '') {
    $conditions[] = 'name LIKE ?';
    $params[]     = '%' . $searchName . '%';
    $types       .= 's';
}
if ($searchEmail !== '') {
    $conditions[] = 'email LIKE ?';
    $params[]     = '%' . $searchEmail . '%';
    $types       .= 's';
}
if ($filterBranch !== '') {
    $conditions[] = 'branch = ?';
    $params[]     = $filterBranch;
    $types       .= 's';
}
if ($filterCourse !== '') {
    $conditions[] = 'course = ?';
    $params[]     = $filterCourse;
    $types       .= 's';
}
if ($cgpaMin !== '' && is_numeric($cgpaMin)) {
    $conditions[] = 'cgpa >= ?';
    $params[]     = (float) $cgpaMin;
    $types       .= 'd';
}
if ($cgpaMax !== '' && is_numeric($cgpaMax)) {
    $conditions[] = 'cgpa <= ?';
    $params[]     = (float) $cgpaMax;
    $types       .= 'd';
}
if (!$showAll) {
    $conditions[] = "status = 'Active'";
}

$whereSql = '';
if (!empty($conditions)) {
    $whereSql = ' WHERE ' . implode(' AND ', $conditions);
}

// ---------- Fetch filtered students ----------
$sql = "SELECT * FROM students$whereSql ORDER BY date_registered DESC";
$stmt = mysqli_prepare($conn, $sql);
if (!empty($params)) {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
}
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

$students = [];
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}
mysqli_stmt_close($stmt);

// ---------- Dashboard stats (pulled with SQL aggregate queries) ----------
$totalStudents = 0;
$avgCgpa = 0;
$branchCounts = [];

$totalResult = mysqli_query($conn, 'SELECT COUNT(*) AS total FROM students');
if ($totalResult) {
    $totalStudents = mysqli_fetch_assoc($totalResult)['total'];
}

$avgResult = mysqli_query($conn, 'SELECT AVG(cgpa) AS avg_cgpa FROM students');
if ($avgResult) {
    $avgCgpa = mysqli_fetch_assoc($avgResult)['avg_cgpa'];
}

$branchResult = mysqli_query($conn, 'SELECT branch, COUNT(*) AS cnt FROM students GROUP BY branch ORDER BY cnt DESC');
if ($branchResult) {
    while ($row = mysqli_fetch_assoc($branchResult)) {
        $branchCounts[] = $row;
    }
}

// Distinct branches/courses for filter dropdowns
$branchOptions = [];
$branchOptResult = mysqli_query($conn, 'SELECT DISTINCT branch FROM students ORDER BY branch');
if ($branchOptResult) {
    while ($row = mysqli_fetch_assoc($branchOptResult)) {
        $branchOptions[] = $row['branch'];
    }
}

$courseOptions = [];
$courseOptResult = mysqli_query($conn, "SELECT DISTINCT course FROM students WHERE course IS NOT NULL AND course <> '' ORDER BY course");
if ($courseOptResult) {
    while ($row = mysqli_fetch_assoc($courseOptResult)) {
        $courseOptions[] = $row['course'];
    }
}

require 'includes/header.php';
?>

<?php if ($status === 'created'): ?>
  <div class="alert alert-success alert-dismissible fade show mt-3" id="successAlert" role="alert">
    <i class="fa-solid fa-circle-check me-2"></i><strong>Success!</strong> Student added successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php elseif ($status === 'updated'): ?>
  <div class="alert alert-success alert-dismissible fade show mt-3" id="successAlert" role="alert">
    <i class="fa-solid fa-circle-check me-2"></i><strong>Record updated successfully.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php elseif ($status === 'deleted'): ?>
  <div class="alert alert-success alert-dismissible fade show mt-3" id="successAlert" role="alert">
    <i class="fa-solid fa-circle-check me-2"></i><strong>Student deleted successfully.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php elseif ($status === 'duplicate'): ?>
  <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
    <i class="fa-solid fa-triangle-exclamation me-2"></i><strong>That email is already registered.</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php elseif ($status === 'error'): ?>
  <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
    <i class="fa-solid fa-circle-exclamation me-2"></i><strong>Something went wrong.</strong> Please try again.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<!-- Dashboard Stats -->
<div class="row g-3 mt-1 mb-4">
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
      <div class="small text-uppercase opacity-75">Students per Branch</div>
      <div class="small mt-1">
        <?php if (empty($branchCounts)): ?>
          <span>No data yet</span>
        <?php else: ?>
          <?php foreach (array_slice($branchCounts, 0, 3) as $b): ?>
            <div><i class="fa-solid fa-diagram-project me-1"></i><?php echo h($b['branch']); ?>: <strong><?php echo $b['cnt']; ?></strong></div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<!-- Search & Filters -->
<div class="card card-soft mb-4 fade-in">
  <div class="card-body p-4">
    <h5 class="mb-3"><i class="fa-solid fa-magnifying-glass me-2 text-primary"></i>Search &amp; Filter</h5>

    <form method="GET" action="index.php" class="mb-3">
      <div class="input-group">
        <span class="input-group-text bg-white"><i class="fa-solid fa-magnifying-glass"></i></span>
        <input type="text" class="form-control" name="quick_search" value="<?php echo h($quickSearch); ?>" placeholder="Quick search by name, branch, or course&hellip;">
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass me-1"></i>Search</button>
        <?php if ($quickSearch !== ''): ?>
          <a href="index.php" class="btn btn-outline-secondary"><i class="fa-solid fa-xmark"></i></a>
        <?php endif; ?>
      </div>
    </form>

    <details class="mb-2">
      <summary class="text-muted small mb-2" style="cursor:pointer;">Advanced filters</summary>
      <form method="GET" action="index.php" class="row g-3 mt-1">
      <input type="hidden" name="quick_search" value="<?php echo h($quickSearch); ?>">
      <div class="col-md-3">
        <label class="form-label small">Name</label>
        <input type="text" class="form-control" name="search_name" value="<?php echo h($searchName); ?>" placeholder="Search by name">
      </div>
      <div class="col-md-3">
        <label class="form-label small">Email</label>
        <input type="text" class="form-control" name="search_email" value="<?php echo h($searchEmail); ?>" placeholder="Search by email">
      </div>
      <div class="col-md-2">
        <label class="form-label small">Branch</label>
        <select class="form-select" name="filter_branch">
          <option value="">All Branches</option>
          <?php foreach ($branchOptions as $b): ?>
            <option value="<?php echo h($b); ?>" <?php echo $filterBranch === $b ? 'selected' : ''; ?>><?php echo h($b); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-2">
        <label class="form-label small">Course</label>
        <select class="form-select" name="filter_course">
          <option value="">All Courses</option>
          <?php foreach ($courseOptions as $c): ?>
            <option value="<?php echo h($c); ?>" <?php echo $filterCourse === $c ? 'selected' : ''; ?>><?php echo h($c); ?></option>
          <?php endforeach; ?>
        </select>
      </div>
      <div class="col-md-1">
        <label class="form-label small">CGPA Min</label>
        <input type="number" step="0.01" min="0" max="10" class="form-control" name="cgpa_min" value="<?php echo h($cgpaMin); ?>">
      </div>
      <div class="col-md-1">
        <label class="form-label small">CGPA Max</label>
        <input type="number" step="0.01" min="0" max="10" class="form-control" name="cgpa_max" value="<?php echo h($cgpaMax); ?>">
      </div>

      <div class="col-12 d-flex justify-content-between align-items-center mt-2">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="show_all" id="show_all" value="1" <?php echo $showAll ? 'checked' : ''; ?>>
          <label class="form-check-label" for="show_all">
            Show inactive students too <span class="text-muted">(showing Active only by default)</span>
          </label>
        </div>
        <div>
          <a href="index.php" class="btn btn-outline-secondary">
            <i class="fa-solid fa-rotate-left me-1"></i>Reset
          </a>
          <button type="submit" class="btn btn-primary">
            <i class="fa-solid fa-magnifying-glass me-1"></i>Apply Filters
          </button>
        </div>
      </div>
      </form>
    </details>
  </div>
</div>

<!-- Students Table -->
<div class="card card-soft fade-in">
  <div class="card-body p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h5 class="mb-0"><i class="fa-solid fa-table me-2 text-primary"></i>Students</h5>
      <span class="badge bg-primary fs-6"><?php echo count($students); ?> shown</span>
    </div>

    <?php if (empty($students)): ?>
      <div class="empty-state">
        <i class="fa-solid fa-user-slash"></i>
        <?php if ($quickSearch !== ''): ?>
          <p class="mb-3">No students found matching your search.</p>
        <?php else: ?>
          <p class="mb-3">No students match these filters.</p>
        <?php endif; ?>
        <a href="add_student.php" class="btn btn-primary btn-sm">
          <i class="fa-solid fa-user-plus me-1"></i>Add a Student
        </a>
      </div>
    <?php else: ?>
      <div class="table-responsive">
        <table class="table table-striped table-hover align-middle">
          <thead>
            <tr>
              <th>Photo</th>
              <th>Name</th>
              <th>Email</th>
              <th>CGPA</th>
              <th>Branch</th>
              <th>Course</th>
              <th>Status</th>
              <th>Last Updated</th>
              <th class="text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($students as $s): ?>
              <tr>
                <td>
                  <?php if (!empty($s['photo']) && file_exists('assets/uploads/' . $s['photo'])): ?>
                    <img src="assets/uploads/<?php echo h($s['photo']); ?>" class="student-photo" alt="<?php echo h($s['name']); ?>">
                  <?php else: ?>
                    <img src="assets/img/default-avatar.svg" class="student-photo" alt="<?php echo h($s['name']); ?>">
                  <?php endif; ?>
                </td>
                <td><?php echo highlight($s['name'], $quickSearch); ?></td>
                <td><?php echo h($s['email']); ?></td>
                <td><?php echo h($s['cgpa']); ?></td>
                <td><?php echo highlight($s['branch'], $quickSearch); ?></td>
                <td><?php echo highlight($s['course'], $quickSearch); ?></td>
                <td>
                  <?php if ($s['status'] === 'Active'): ?>
                    <span class="badge bg-success">Active</span>
                  <?php else: ?>
                    <span class="badge bg-secondary">Inactive</span>
                  <?php endif; ?>
                </td>
                <td class="small text-muted">
                  <?php echo h(date('M j, Y g:i A', strtotime($s['updated_at']))); ?>
                </td>
                <td class="text-end">
                  <a href="edit_student.php?id=<?php echo (int) $s['id']; ?>" class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen"></i>
                  </a>
                  <form action="delete_student.php" method="POST" class="d-inline delete-form" data-student-name="<?php echo h($s['name']); ?>">
                    <input type="hidden" name="id" value="<?php echo (int) $s['id']; ?>">
                    <button type="submit" class="btn btn-sm btn-outline-danger">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    <?php endif; ?>
  </div>
</div>

<?php require 'includes/footer.php'; ?>
