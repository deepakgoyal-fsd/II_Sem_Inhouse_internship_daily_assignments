<?php
include("header.php");
include("db_connect.php");
include("checkLogin.php");
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
                    <th></th>
                </tr>

                <?php

                $selectQuery = "SELECT * FROM user";
                $result = mysqli_query($conn, $selectQuery);

                $user = mysqli_fetch_all($result, MYSQLI_ASSOC);

                if ($user) {

                    for ($i = 0; $i < count($user); $i++) {

                        echo "
                        <tr>
                            <td>" . $user[$i]['name'] . "</td>
                            <td>" . $user[$i]['email'] . "</td>
                            <td>
                                <a href='UpdatePassword.php?id=" . $user[$i]['id'] . "'>
                                    Update Password
                                </a>
                            </td>
                        </tr>";
                    }

                } else {

                    echo "Error";
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