<?php
require_once 'config/db_connect.php';

function h($value) {
    return htmlspecialchars($value ?? '', ENT_QUOTES, 'UTF-8');
}

$status = $_GET['status'] ?? '';
$msg    = $_GET['msg'] ?? '';
$dupEmail = $_GET['email'] ?? '';

// Fetch all students, most recent first
$result = mysqli_query($conn, 'SELECT * FROM students ORDER BY date_registered DESC');
$students = [];
$maxCgpa = 0;

if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $students[] = $row;
        if ((float) $row['cgpa'] > $maxCgpa) {
            $maxCgpa = (float) $row['cgpa'];
        }
    }
}
$totalStudents = count($students);

require 'includes/header.php';
?>

<?php if ($status === 'success'): ?>
  <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
    <i class="fa-solid fa-circle-check me-2"></i><strong>Success!</strong> Student registered successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php elseif ($status === 'duplicate'): ?>
  <div class="alert alert-warning alert-dismissible fade show mt-4" role="alert">
    <i class="fa-solid fa-triangle-exclamation me-2"></i>
    <strong>Duplicate email.</strong> A student with the email <?php echo h($dupEmail); ?> is already registered.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php elseif ($status === 'error'): ?>
  <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
    <i class="fa-solid fa-circle-exclamation me-2"></i><strong>Error:</strong> <?php echo h($msg); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<div class="row mt-3 g-4">

  <!-- Registration Form -->
  <div class="col-lg-5">
    <div class="card card-soft">
      <div class="card-body p-4">
        <h4 class="mb-3"><i class="fa-solid fa-user-plus me-2 text-primary"></i>Register Student</h4>

        <form action="register.php" method="POST" class="needs-validation" novalidate>
          <div class="mb-3">
            <label for="name" class="form-label">Full Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="cgpa" class="form-label">CGPA (0&ndash;10) <span class="text-danger">*</span></label>
            <input type="number" step="0.01" min="0" max="10" class="form-control" id="cgpa" name="cgpa" required>
          </div>
          <div class="mb-3">
            <label for="branch" class="form-label">Branch <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="branch" name="branch" placeholder="e.g. CSE" required>
          </div>
          <div class="mb-3">
            <label for="college" class="form-label">College <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="college" name="college" required>
          </div>
          <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <input type="text" class="form-control" id="course" name="course" placeholder="e.g. B.Tech">
          </div>
          <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="2"></textarea>
          </div>
          <div class="mb-3">
            <label for="photo_filename" class="form-label">Photo Filename <span class="text-muted small">(optional)</span></label>
            <input type="text" class="form-control" id="photo_filename" name="photo_filename" placeholder="e.g. student_photo.jpg">
            <div class="form-text">No file upload handling yet &mdash; just stores a filename for now.</div>
          </div>
          <div class="d-grid">
            <button type="submit" class="btn btn-primary">
              <i class="fa-solid fa-floppy-disk me-2"></i>Save to Database
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Records Table -->
  <div class="col-lg-7">
    <div class="card card-soft">
      <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="mb-0"><i class="fa-solid fa-table me-2 text-primary"></i>Registered Students</h4>
          <span class="badge bg-primary fs-6">Total: <?php echo $totalStudents; ?> students</span>
        </div>

        <?php if ($totalStudents === 0): ?>
          <p class="text-muted mb-0">No students registered yet. Use the form to add the first one.</p>
        <?php else: ?>
          <div class="table-responsive">
            <table class="table table-hover align-middle">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>CGPA</th>
                  <th>Branch</th>
                  <th>College</th>
                  <th>Course</th>
                  <th>Address</th>
                  <th>Registered On</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($students as $i => $s): ?>
                  <?php $isTop = ((float) $s['cgpa'] === $maxCgpa && $maxCgpa > 0); ?>
                  <tr class="<?php echo $isTop ? 'top-cgpa-row' : ''; ?>">
                    <td><?php echo $i + 1; ?></td>
                    <td><?php echo h($s['name']); ?></td>
                    <td><?php echo h($s['email']); ?></td>
                    <td>
                      <?php echo h($s['cgpa']); ?>
                      <?php if ($isTop): ?><i class="fa-solid fa-crown text-warning ms-1" title="Top CGPA"></i><?php endif; ?>
                    </td>
                    <td><?php echo h($s['branch']); ?></td>
                    <td><?php echo h($s['college']); ?></td>
                    <td><?php echo h($s['course']); ?></td>
                    <td><?php echo h($s['address']); ?></td>
                    <td><?php echo h(date('M j, Y g:i A', strtotime($s['date_registered']))); ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        <?php endif; ?>

      </div>
    </div>
  </div>

</div>

<?php require 'includes/footer.php'; ?>
