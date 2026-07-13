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
$sql = "SELECT * FROM user";
$result = mysqli_query($conn, $sql);

include("dashboardVerticalContent.php");
?>

<h2>All Users</h2>
<div class="container mt-4">
    <table class="table table-bordered table-striped">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php while($row = mysqli_fetch_assoc($result)){
            $image = empty($row['profile_pic'])?"default.jpg":$row['profile_pic']; ?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['name']; ?></td>
            <td><?= $row['email']; ?></td>
            <td><?= $row['role']; ?></td>
            <td><img src="images/<?= $image; ?>" width="50"></td>
            <td><a href="editUser.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="deleteUsers.php?id=<?= $row['id']; ?>" 
                    class="btn btn-danger btn-sm" 
                    onclick = "return confirm('Are you sure you want to delete this user ?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php
include("dashboardFooter.php");
include("footer.php");
?>