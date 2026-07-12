<?php
session_start();

if (!isset($_SESSION['user_email'])) {
    header("Location: login.php");
    exit();
}

include("header.php");
include("db_connect1.php");
?>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-3">
            <a href="UpdatePassword.php">Manage Users</a>
        </div>

        <div class="col-md-9">

            <table class="table table-bordered">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

                <?php

                $selectQuery = "SELECT id, name, email FROM user";
                $result = mysqli_query($conn, $selectQuery);

                if (!$result) {
                    die("Query Error: " . mysqli_error($conn));
                }

                while ($row = mysqli_fetch_assoc($result)) {

                    $id = isset($row['id']) ? $row['id'] : "";
                    $name = isset($row['name']) ? $row['name'] : "";
                    $email = isset($row['email']) ? $row['email'] : "";

                    echo "
                    <tr>
                        <td>$name</td>
                        <td>$email</td>
                        <td>
                            <a href='UpdatePassword.php?id=$id'>Update Password</a>
                        </td>
                    </tr>";
                }

                ?>

            </table>

        </div>

    </div>
</div>

<?php
include("dashboardfooter.php");
include("footer.php");
?>