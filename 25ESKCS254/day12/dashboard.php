<?php

session_start();

if (!isset($_SESSION['user_id'])) {

    header("Location: login.php");
    exit();

}
include 'db_connect.php';

$totalStudents = mysqli_num_rows(
    mysqli_query($conn, "SELECT * FROM students")
);

$totalBranches = mysqli_num_rows(
    mysqli_query($conn, "SELECT DISTINCT branch FROM students")
);

$recentStudents = mysqli_query(
    $conn,
    "SELECT * FROM students ORDER BY id DESC LIMIT 5"
);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-success text-white">

<h3>Student Management Dashboard</h3>

</div>

<div class="card-body">

<div class="alert alert-success">

<h4>
<div class="row mt-4">

    <div class="col-md-4 mb-3">

        <div class="card text-white bg-primary shadow">

            <div class="card-body">

                <h5>Total Students</h5>

                <h2><?php echo $totalStudents; ?></h2>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card text-white bg-success shadow">

            <div class="card-body">

                <h5>Total Branches</h5>

                <h2><?php echo $totalBranches; ?></h2>

            </div>

        </div>

    </div>

    <div class="col-md-4 mb-3">

        <div class="card text-white bg-dark shadow">

            <div class="card-body">

                <h5>Logged In User</h5>

                <h5><?php echo $_SESSION['user_name']; ?></h5>

            </div>

        </div>

    </div>

</div>
Welcome,

<?php echo htmlspecialchars($_SESSION['user_name']); ?>!

</h4>

<p>

You have successfully logged in.

</p>

</div>
<div class="card shadow mt-4">

    <div class="card-header bg-dark text-white">

        <h4>Recent Registrations</h4>

    </div>

    <div class="card-body">

        <table class="table table-striped table-hover">

            <thead>

                <tr>

                    <th>Name</th>
                    <th>Branch</th>
                    <th>Course</th>

                </tr>

            </thead>

            <tbody>

            <?php

            while($row=mysqli_fetch_assoc($recentStudents)){

            ?>

            <tr>

                <td><?php echo $row['name']; ?></td>

                <td><?php echo $row['branch']; ?></td>

                <td><?php echo $row['course']; ?></td>

            </tr>

            <?php

            }

            ?>

            </tbody>

        </table>

    </div>

</div>
<div class="card shadow mt-4">
    <div class="card-header bg-primary text-white">
        Quick Actions
    </div>
    <div class="card-body">
        <a href="index2.php" class="btn btn-success me-2">
            Add Student
        </a>
        <a href="students.php" class="btn btn-primary me-2">
            View Students
        </a>
        </a>
    <a href="change_password.php" class="btn btn-warning">

    Change Password

</a>
        <a href="profile.php" class="btn btn-info me-2">
            My Profile
        </a>
        <a href="logout.php" class="btn btn-danger">
            Logout
        </a>
    </div>
</div>
</div>

</div>

</div>

</body>

</html>