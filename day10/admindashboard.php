<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

include("../db_connect.php");
include("../dashboardheader.php");
?>

<div class="container mt-4">

    <h2 class="mb-4">Admin Dashboard</h2>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>

        <tbody>

        <?php

        $selectQuery = "SELECT * FROM user";
        $result = mysqli_query($conn, $selectQuery);

        if(mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result))
            {
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <?php
                        if($row['role'] == 0)
                            echo "Admin";
                        else
                            echo "User";
                        ?>
                    </td>
                </tr>
                <?php
            }
        }
        else
        {
            ?>
            <tr>
                <td colspan="4" class="text-center">No Users Found</td>
            </tr>
            <?php
        }

        ?>

        </tbody>

    </table>

</div>

<?php
include("../dashboardfooter.php");
include("../footer.php");
?>