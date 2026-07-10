<?php
include("../dashhead.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <a href="updatePassword.php">Update Password</a>
            <a href="updateProfile.php">Update Profile</a>
        </div>
        <div class="col-md-9">
            <h1>Admin Dashboard</h1>
            <p>Welcome, Admin!</p>
            <br>
            <h2>Manage Users</h2>
        
        <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include("../db_connect.php");
                    $query = "SELECT id, name, email, role FROM user";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['role']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
<?php
include("../dashboardfooter.php");
include("../footer.php");
?>