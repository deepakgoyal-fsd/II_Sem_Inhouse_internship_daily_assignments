<?php
session_start();
include("header.php");

if (!isset($_SESSION['user_id'])) {
    header("location: login.php");
    exit();
}
if($_SESSION['user_role'] !== "teacher"){
    header("Location: dashboard.php");
    exit();
}
include("db_connect.php");
$sql = "SELECT COUNT(*) AS total FROM user";
$result = mysqli_query($conn,$sql);
$totalUsers = mysqli_fetch_assoc($result)['total'];

$sql = "SELECT COUNT(*) AS total FROM user WHERE role='teacher'";
$result = mysqli_query($conn,$sql);
$totalTeachers = mysqli_fetch_assoc($result)['total'];

$sql = "SELECT COUNT(*) AS total FROM user WHERE role='student'";
$result = mysqli_query($conn,$sql);
$totalStudents = mysqli_fetch_assoc($result)['total'];

$totalActive = $totalUsers;

include("dashboardVerticalContent.php");
?>

<h2>Admin Dashboard</h2>
<h2 class="mb-4">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?>!</h2>

<div class = "row mb-4">
    <div class="col-md-3">
        <div class = "card text-bg-primary shadow">
            <div class = "card-body text-center">
                <h5>Total Users</h2>
                <h2><?= $totalUsers ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class = "card text-bg-success shadow">
            <div class = "card-body text-center">
                <h5>Total Teachers</h2>
                <h2><?= $totalTeachers ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class = "card text-bg-warning shadow">
            <div class = "card-body text-center">
                <h5>Total Students</h2>
                <h2><?= $totalStudents ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class = "card text-bg-danger shadow">
            <div class = "card-body text-center">
                <h5>Active</h2>
                <h2><?= $totalActive?></h2>
            </div>
        </div>
    </div>
</div>

<a href="viewUsers.php" class="btn btn-primary me-2">View Users</a>

<?php
include("dashboardFooter.php");
include("footer.php");
?>