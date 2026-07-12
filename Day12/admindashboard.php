<?php
include("dashboardHeader.php");
include("db_connect.php");
?>

<div class="container-fluid">
    <div class="row">

        <?php include("dashboardverticalcontent.php"); ?>

        <div class="col-md-9">
            <h2>Manage Users</h2>

            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>

                <?php

                $selectQuery = "SELECT * FROM user";
                $result = mysqli_query($conn, $selectQuery);

                if ($result) {

                    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);

                    for ($i = 0; $i < count($users); $i++) {

                        echo "<tr>
                                <td>".$users[$i]['name']."</td>
                                <td>".$users[$i]['email']."</td>
                                <td>
                                    <a href='#'>Edit</a> |
                                    <a href='#'>Delete</a>
                                </td>
                              </tr>";
                    }

                } else {

                    echo "<tr>
                            <td colspan='3'>Error fetching data.</td>
                          </tr>";

                }

                ?>

            </table>

        </div>

    </div>
</div>

<?php
include("dashboardfooter.php");
?>
