<?php
include 'db.php';
session_start();

// Security Wall Layer Check
if (!isset($_SESSION['admin_logged_in'])) {
    die("<h2 style='color:red; font-family:sans-serif; text-align:center; padding-top:50px;'>Security Guard Exception: Please log in first.</h2>");
}

if (isset($_GET['delete_id'])) {
    $target_id = $_GET['delete_id'];
    mysqli_query($conn, "DELETE FROM students WHERE id = $target_id");
    header("Location: view.php");
}

$result = mysqli_query($conn, "SELECT * FROM students");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Database Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="dashboard.php">SKIT Portal Admin</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="dashboard.php">Home Dashboard</a>
                <a class="nav-link text-danger fw-bold" href="logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card p-4 shadow-sm bg-white border">
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-2">
                <h3 class="text-dark fw-bold mb-0">Live Student Management Panel</h3>
                <a href="register.php" class="btn btn-primary btn-sm fw-bold">+ Register New Entry</a>
            </div>

            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th style="width: 80px;">ID</th>
                        <th>Student Name</th>
                        <th>Engineering Branch</th>
                        <th style="width: 150px;" class="text-center">System Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td><strong>" . $row['name'] . "</strong></td>";
                            echo "<td><span class='badge bg-secondary'>" . $row['branch'] . "</span></td>";
                            echo "<td class='text-center'><a href='view.php?delete_id=" . $row['id'] . "' class='btn btn-danger btn-sm fw-bold'>Delete Record</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' class='text-center text-muted py-3'>No database records found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>