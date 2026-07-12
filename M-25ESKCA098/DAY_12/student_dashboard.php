<?php
session_start();
require_once 'config.php';

if (!isset($_SESSION['student_id'])) {
    header("Location: student_login.php");
    exit();
}

$id = $_SESSION['student_id'];
$sql = "SELECT * FROM students WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
$stmt->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .dashboard-card { border-radius: 15px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">EduPortal</a>
            <div>
                <span class="navbar-text me-3">Welcome, <?= htmlspecialchars($student['name']) ?></span>
                <a href="logout.php?type=student" class="btn btn-light">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card dashboard-card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4>Your Profile</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr><th>Name</th><td><?= htmlspecialchars($student['name']) ?></td></tr>
                            <tr><th>Email</th><td><?= htmlspecialchars($student['email']) ?></td></tr>
                            <tr><th>College</th><td><?= htmlspecialchars($student['college']) ?></td></tr>
                            <tr><th>Branch</th><td><?= htmlspecialchars($student['branch']) ?></td></tr>
                            <tr><th>Semester</th><td><?= htmlspecialchars($student['semester']) ?></td></tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>