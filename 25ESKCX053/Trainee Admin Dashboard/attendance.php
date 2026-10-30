<?php 
include 'header.php'; 

// Handle adding attendance
if (isset($_POST['mark_attendance'])) {
    $trainee_id = $_POST['trainee_id'];
    $date = $_POST['date'];
    $status = $_POST['status'];
    
    $sql = "INSERT INTO attendance (trainee_id, date, status) VALUES ('$trainee_id', '$date', '$status')";
    mysqli_query($conn, $sql);
}

// Fetch attendance with trainee names
$query = "SELECT attendance.id, attendance.date, attendance.status, trainees.name 
          FROM attendance 
          LEFT JOIN trainees ON attendance.trainee_id = trainees.id 
          ORDER BY attendance.date DESC";
$attendance_logs = mysqli_query($conn, $query);

$trainees = mysqli_query($conn, "SELECT id, name FROM trainees");
?>

<h2 class="mb-4">Attendance Tracking</h2>

<div class="card shadow-sm mb-4">
    <div class="card-header bg-white fw-bold">Mark Attendance</div>
    <div class="card-body">
        <form method="POST" action="" class="row g-3">
            <div class="col-md-4">
                <select name="trainee_id" class="form-select" required>
                    <option value="">Select Trainee...</option>
                    <?php while($t = mysqli_fetch_assoc($trainees)): ?>
                        <option value="<?php echo $t['id']; ?>"><?php echo $t['name']; ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-3">
                <input type="date" name="date" class="form-control" required>
            </div>
            <div class="col-md-3">
                <select name="status" class="form-select" required>
                    <option value="Present">Present</option>
                    <option value="Absent">Absent</option>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" name="mark_attendance" class="btn btn-success w-100">Submit</button>
            </div>
        </form>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Log ID</th><th>Trainee Name</th><th>Date</th><th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_assoc($attendance_logs)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name'] ? $row['name'] : '<span class="text-muted">Deleted</span>'; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td>
                        <?php if($row['status'] == 'Present'): ?>
                            <span class="badge bg-success">Present</span>
                        <?php else: ?>
                            <span class="badge bg-danger">Absent</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php 
include 'footer.php'; 
?>