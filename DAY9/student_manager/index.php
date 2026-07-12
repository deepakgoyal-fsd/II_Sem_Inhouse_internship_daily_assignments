<?php 
// Include the database connection
include 'db.php'; 

// 1. Get Total Students
$totalQuery = $conn->query("SELECT COUNT(id) AS total FROM students");
$totalStudents = $totalQuery->fetch_assoc()['total'];

// 2. Get Average CGPA
$avgQuery = $conn->query("SELECT ROUND(AVG(cgpa), 2) AS avg_cgpa FROM students");
$avgCgpa = $avgQuery->fetch_assoc()['avg_cgpa'] ?? '0.00'; // Default to 0.00 if null

// 3. Get Students per Branch
$branchQuery = $conn->query("SELECT branch, COUNT(id) AS count FROM students GROUP BY branch");
$branchStats = [];
while ($row = $branchQuery->fetch_assoc()) {
    $branchStats[] = $row['branch'] . ": " . $row['count'];
}
$branchString = implode(" | ", $branchStats); // e.g., "CS: 2 | IT: 1 | EE: 1"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
   <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Student Management Dashboard</h2>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
            + Add Student
        </button>
    </div>
    <!-- Placeholder for Dashboard Stats (Task 5) -->
   <!-- Dashboard Stats (Task 5) -->
   <!-- Dashboard Stats (Task 5) -->
    <div class="row mb-4" id="dashboard-stats">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Students</h5>
                    <p class="card-text fs-3"><?php echo $totalStudents; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Average CGPA</h5>
                    <p class="card-text fs-3"><?php echo $avgCgpa; ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Students per Branch</h5>
                    <p class="card-text fs-5 mt-2"><?php echo $branchString; ?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Dashboard Stats -->

    <!-- Placeholder for Search and Filter (Tasks 2, 3, 4) -->
    <!-- Search and Filter (Tasks 2, 3, 4) -->
    <div class="card mb-4">
        <div class="card-body">
            <form method="GET" action="index.php" class="row g-3">
                
                <!-- Multi-Field Search (Name/Email) -->
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Name or Email" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                </div>

                <!-- Course/Branch Filter -->
                <div class="col-md-2">
                    <select name="branch" class="form-select">
                        <option value="">All Branches</option>
                        <option value="CS" <?php echo (isset($_GET['branch']) && $_GET['branch'] == 'CS') ? 'selected' : ''; ?>>CS</option>
                        <option value="IT" <?php echo (isset($_GET['branch']) && $_GET['branch'] == 'IT') ? 'selected' : ''; ?>>IT</option>
                        <option value="EE" <?php echo (isset($_GET['branch']) && $_GET['branch'] == 'EE') ? 'selected' : ''; ?>>EE</option>
                    </select>
                </div>

                <!-- CGPA Range -->
                <div class="col-md-2">
                    <input type="number" step="0.01" name="min_cgpa" class="form-control" placeholder="Min CGPA" value="<?php echo isset($_GET['min_cgpa']) ? htmlspecialchars($_GET['min_cgpa']) : ''; ?>">
                </div>
                <div class="col-md-2">
                    <input type="number" step="0.01" name="max_cgpa" class="form-control" placeholder="Max CGPA" value="<?php echo isset($_GET['max_cgpa']) ? htmlspecialchars($_GET['max_cgpa']) : ''; ?>">
                </div>

                <!-- Student Status -->
                <div class="col-md-2">
                    <select name="status" class="form-select">
                        <option value="Active" <?php echo (!isset($_GET['status']) || $_GET['status'] == 'Active') ? 'selected' : ''; ?>>Active Only</option>
                        <option value="All" <?php echo (isset($_GET['status']) && $_GET['status'] == 'All') ? 'selected' : ''; ?>>All Statuses</option>
                        <option value="Inactive" <?php echo (isset($_GET['status']) && $_GET['status'] == 'Inactive') ? 'selected' : ''; ?>>Inactive Only</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="col-md-1">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
                
            </form>
        </div>
    </div>

    <!-- Main Student Table -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Branch</th>
                        <th>CGPA</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                
                    <?php
                    // 1. Start with a base array to hold our WHERE conditions
                    $whereClauses = [];

                    // 2. Status Filter (Default to 'Active' as per assignment, unless 'All' is selected)
                    $status = $_GET['status'] ?? 'Active';
                    if ($status !== 'All') {
                        $whereClauses[] = "status = '" . $conn->real_escape_string($status) . "'";
                    }

                    // 3. Multi-Field Search (Name or Email)
                    if (!empty($_GET['search'])) {
                        $searchTerm = $conn->real_escape_string($_GET['search']);
                        $whereClauses[] = "(name LIKE '%$searchTerm%' OR email LIKE '%$searchTerm%')";
                    }

                    // 4. Branch Filter
                    if (!empty($_GET['branch'])) {
                        $branch = $conn->real_escape_string($_GET['branch']);
                        $whereClauses[] = "branch = '$branch'";
                    }

                    // 5. CGPA Range Filter
                    if (!empty($_GET['min_cgpa'])) {
                        $min = (float)$_GET['min_cgpa'];
                        $whereClauses[] = "cgpa >= $min";
                    }
                    if (!empty($_GET['max_cgpa'])) {
                        $max = (float)$_GET['max_cgpa'];
                        $whereClauses[] = "cgpa <= $max";
                    }

                    // 6. Combine the query dynamically
                    $sql = "SELECT * FROM students";
                    if (count($whereClauses) > 0) {
                        $sql .= " WHERE " . implode(" AND ", $whereClauses);
                    }
                    $sql .= " ORDER BY id DESC";

                    // Execute the final query
                    $studentsQuery = $conn->query($sql);

                    // ... The rest of your while loop stays exactly the same ...
                    if ($studentsQuery->num_rows > 0) {
                        while ($student = $studentsQuery->fetch_assoc()) {
                            // Determine status badge color
                            $badgeClass = ($student['status'] == 'Active') ? 'bg-success' : 'bg-secondary';
                            
                            // Check if the image actually exists on the server
                            $photoPath = 'uploads/' . $student['profile_photo'];
                            if (!empty($student['profile_photo']) && file_exists($photoPath)) {
                                $imgSrc = htmlspecialchars($photoPath);
                            } else {
                                // Fallback directly to an inline SVG placeholder so it loads instantly with the HTML
                                $imgSrc = 'data:image/svg+xml;charset=UTF-8,%3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20width%3D%2240%22%20height%3D%2240%22%20viewBox%3D%220%200%2040%2040%22%3E%3Crect%20width%3D%2240%22%20height%3D%2240%22%20fill%3D%22%23cccccc%22%2F%3E%3Ctext%20x%3D%2250%25%22%20y%3D%2250%25%22%20dominant-baseline%3D%22middle%22%20text-anchor%3D%22middle%22%20fill%3D%22%23666666%22%20font-family%3D%22sans-serif%22%20font-size%3D%2212px%22%3ENo%20Pic%3C%2Ftext%3E%3C%2Fsvg%3E';
                            }
                            
                            echo "<tr>";
                            // Profile Photo cell - no more onerror JavaScript!
                            echo "<td><img src='{$imgSrc}' width='40' height='40' class='rounded-circle border' alt='Photo'></td>";
                            echo "<td>" . htmlspecialchars($student['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($student['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($student['branch']) . "</td>";
                            echo "<td>" . htmlspecialchars($student['cgpa']) . "</td>";
                            echo "<td><span class='badge {$badgeClass}'>" . htmlspecialchars($student['status']) . "</span></td>";
                            echo "<td>
                                    <button class='btn btn-sm btn-outline-primary'>Edit</button>
                                  </td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No students found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- IMPORTANT: enctype is required for file uploads -->
            <form action="add_student.php" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Branch</label>
                            <select name="branch" class="form-select" required>
                                <option value="CS">Computer Science (CS)</option>
                                <option value="IT">Information Technology (IT)</option>
                                <option value="EE">Electrical Engineering (EE)</option>
                                <option value="ME">Mechanical Engineering (ME)</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">CGPA</label>
                            <input type="number" step="0.01" name="cgpa" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Profile Photo</label>
                        <input type="file" name="profile_photo" class="form-control" accept="image/*">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save Student</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>