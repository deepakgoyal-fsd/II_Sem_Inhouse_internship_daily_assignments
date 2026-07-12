<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: index.php");
    exit();
}
include("db_connect.php");
$query = "SELECT * FROM students ORDER BY id DESC";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information</title>
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
                <h4 class="mb-0">Student Information</h4>
                <a href="add_student.php" class="btn btn-primary">
                    Add Student
                </a>
            </div>
        </nav>
        <div class="container mt-4">
            <div class="card shadow border-0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover text-center align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>College</th>
                                    <th>Branch</th>
                                    <th>Created At</th>
                                    <th>Updated At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            if(mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_assoc($result))
                                {
                            ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['college']; ?></td>
                                    <td><?php echo $row['branch']; ?></td>
                                    <td><?php echo $row['created_at']; ?></td>
                                    <td><?php echo $row['updated_at']; ?></td>
                                    <td>
                                        <a href="edit_student.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                                            Edit
                                        </a>
                                        <a href="delete_student.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?');">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php
                                }
                            }
                            else
                            {
                                echo "<tr><td colspan='8'>No Student Found</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>