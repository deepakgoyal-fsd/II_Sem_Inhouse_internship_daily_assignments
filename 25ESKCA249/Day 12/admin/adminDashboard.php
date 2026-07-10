<?php
session_start();
include("../db_connect.php");
include("../dashboardHeader.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <a href="../updatePassword.php">Update Password</a>
            <br>
            <a href="../updateProfile.php">Update Profile</a>
        </div>

        <div class="col-md-9">
            <h2>Manage your Profile</h2>

            <table class="table table-bordered table-striped mt-3">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                </tr>

                <?php
                $selectQuery = "SELECT * FROM user";
                $result = mysqli_query($conn, $selectQuery);

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($user = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>" . htmlspecialchars($user['name']) . "</td>
                            <td>" . htmlspecialchars($user['email']) . "</td>
                        </tr>";
                    }
                } else {
                    echo "<tr>
                        <td colspan='2' class='text-center'>No users found</td>
                    </tr>";
                }
                ?>
            </table>
        </div>
    </div>
</div>

<?php
include("../footer.php");
?>
