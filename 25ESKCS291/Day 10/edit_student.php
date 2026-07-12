<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
include("db_connect.php");
if (!isset($_GET['id'])) {
    header("Location: students.php");
    exit();
}
$id = $_GET['id'];
$query = "SELECT * FROM students WHERE id = ?";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) == 0) {
    header("Location: students.php");
    exit();
}
$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="d-flex">
    <div class="bg-primary text-white p-3 vh-100" style="width:250px;">
        <h3 class="text-center mb-4">Admin Panel</h3>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="dashboard.php" class="nav-link text-white">Dashboard</a>
            </li>
            <li class="nav-item mb-2">
                <a href="students.php" class="nav-link text-white">Student Information</a>
            </li>
            <li class="nav-item mb-2">
                <a href="add_student.php" class="nav-link text-white">Add Student</a>
            </li>
            <li class="nav-item mt-4">
                <a href="logout.php" class="nav-link text-white">Logout</a>
            </li>
        </ul>
    </div>
    <div class="flex-grow-1">
        <nav class="navbar navbar-expand-lg bg-light shadow-sm">
            <div class="container-fluid">
                <h4 class="mb-0">Edit Student</h4>
                <a href="students.php" class="btn btn-secondary">
                    Back
                </a>
            </div>
        </nav>
        <div class="container mt-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <form action="process_update.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($row['name']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($row['email']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Leave blank to keep existing password">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">College</label>
                            <input type="text" name="college" class="form-control" value="<?php echo htmlspecialchars($row['college']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Branch</label>
                            <input type="text" name="branch" class="form-control" value="<?php echo htmlspecialchars($row['branch']); ?>" required>
                        </div>
                        <button type="submit" name="update" class="btn btn-primary">
                            Update Student
                        </button>
                        <a href="students.php" class="btn btn-danger">
                            Cancel
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>