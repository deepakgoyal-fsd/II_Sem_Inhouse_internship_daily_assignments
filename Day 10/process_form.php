<?php
$page = "register";
include 'header.php';
echo '<div class="container my-5">';
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, trim($_POST['name'] ?? ''));
    $email = mysqli_real_escape_string($conn, trim($_POST['email'] ?? ''));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone'] ?? ''));
    $city = mysqli_real_escape_string($conn, trim($_POST['city'] ?? ''));
    $course = mysqli_real_escape_string($conn, trim($_POST['course'] ?? ''));
    $branch = mysqli_real_escape_string($conn, trim($_POST['branch'] ?? ''));
    $address = mysqli_real_escape_string($conn, trim($_POST['address'] ?? ''));
    $cgpa = mysqli_real_escape_string($conn, trim($_POST['cgpa'] ?? ''));
    $photo = mysqli_real_escape_string($conn, trim($_POST['photo'] ?? ''));

    $checkSql = "SELECT id FROM students WHERE email = '$email'";
    $checkResult = mysqli_query($conn, $checkSql);

    if (mysqli_num_rows($checkResult) > 0) {
        echo '
        <div class="alert alert-warning shadow-sm border-0 d-flex align-items-center p-4">
        <i class="fas fa-exclamation-triangle fa-2x me-3 text-warning"></i>
        <div>
        <h4 class="alert-heading mb-1">Email Already Exists!</h4>
        <p class="mb-0">The email address <strong>' . htmlspecialchars($email) . '</strong> is already registered.</p>
        </div>
        </div>
        <a href="index.php" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Try Again</a>';
    } else {
        $sql = "INSERT INTO students (name, email, phone, city, course, branch, address, cgpa, photo) 
                VALUES ('$name', '$email', '$phone', '$city', '$course', '$branch', '$address', '$cgpa', '$photo')";

        if (mysqli_query($conn, $sql)) {
            $countSql = "SELECT COUNT(*) as total FROM students";
            $countResult = mysqli_query($conn, $countSql);
            $countRow = mysqli_fetch_assoc($countResult);
            $totalStudents = $countRow['total'];

            echo '
            <div class="glass-card text-center overflow-hidden">
            <div class="bg-success text-white py-4">
            <i class="fas fa-check-circle fa-4x mb-3"></i>
            <h2 class="mb-0">Student Registered Successfully!</h2>
            </div>
            <div class="p-5">
            <div class="alert alert-info border-0 shadow-sm mb-4 fs-5">
            <i class="fas fa-info-circle"></i> You are student <strong>#' . $totalStudents . '</strong> in our system!
            </div>
            <h4 class="mb-4">Record Saved to MySQL Database:</h4>
            <div class="row text-start justify-content-center">
            <div class="col-md-8">
            <ul class="list-group shadow-sm">
            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
            <span class="text-muted fw-bold"><i class="fas fa-user w-20px"></i> Name</span>
            <span class="fw-bold">' . htmlspecialchars($name) . '</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
            <span class="text-muted fw-bold"><i class="fas fa-envelope w-20px"></i> Email</span>
            <span class="fw-bold">' . htmlspecialchars($email) . '</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center py-3">
            <span class="text-muted fw-bold"><i class="fas fa-star w-20px"></i> CGPA</span>
            <span class="fw-bold fs-5 text-primary">' . htmlspecialchars($cgpa) . '</span>
            </li>
            </ul>
            </div>
            </div>
            <div class="mt-5">
            <a href="students.php" class="btn btn-gradient px-4 py-2 me-2"><i class="fas fa-table"></i> View All Records</a>
            <a href="index.php" class="btn btn-outline-secondary px-4 py-2"><i class="fas fa-plus"></i> Add Another</a>
            </div>
            </div>
            </div>';
        } else {
            echo '
            <div class="alert alert-danger shadow-sm border-0 d-flex align-items-center p-4">
            <i class="fas fa-times-circle fa-2x me-3 text-danger"></i>
            <div>
            <h4 class="alert-heading mb-1">Database Error!</h4>
            <p class="mb-0">Failed to save record: ' . mysqli_error($conn) . '</p>
            </div>
            </div>';
        }
    }
} else {
    header("Location: index.php");
    exit();
}

echo '</div>';
include 'footer.php';
