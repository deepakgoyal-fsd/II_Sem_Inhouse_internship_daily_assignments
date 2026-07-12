<?php
session_start();
include("DBconnect.php");

if(!isset($_SESSION['user_name'])){
    header("location: login.php");
    exit();
}

include("dashboardheader.php");
include("dashboardverticalcontent.php");
?>

<div class="container-fluid mt-4">
    <div class="row">

        <!-- Left Side -->
        <div class="col-md-3">
            <div class="list-group">
                <a href="updatepassword.php" class="list-group-item list-group-item-action">
                    Update Password  
                </a>
                <a href="updateprofile.php" class="list-group-item list-group-item-action">
                    Update Profile
                </a>
            </div>
        </div>

        <!-- Right Side -->
        <div class="col-md-9">

            <h2 class="text-center mb-4">Manage Users</h2>

            <table class="table table-bordered table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                $selectQuery = "SELECT * FROM user";
                $result = mysqli_query($conn, $selectQuery);

                $i = 1;

                while($user = mysqli_fetch_assoc($result))
                {
                    echo "
                    <tr>
                        <td>".$i."</td>
                        <td>".$user['name']."</td>
                        <td>".$user['email']."</td>
                    </tr>
                    ";

                    $i++;
                }
                ?>

                </tbody>

            </table>

        </div>
    </div>
</div>

<?php
include("dashboardfooter.php");
include("footer.php");
?>