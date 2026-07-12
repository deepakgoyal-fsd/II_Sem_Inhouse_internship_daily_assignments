<?php
include("../SQLconnect.php");
include("../dashheader.php");

$selectQuery = "SELECT * FROM user";
$result = mysqli_query($conn, $selectQuery);
$user = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="container mt-5">
    <h3 class="mb-3">All Users</h3>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($user) {
                for ($i = 0; $i < count($user); $i++) {
                    echo "<tr>
                            <td>" . $user[$i]['id'] . "</td>
                            <td>" . $user[$i]['name'] . "</td>
                            <td>" . $user[$i]['email'] . "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='text-center'>No users found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php
include("../dashfooter.php");
include("../fotter.php");
?>
