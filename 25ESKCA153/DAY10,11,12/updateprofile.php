<?php
session_start();
include("db-connect.php");
include("dashboardheader.php");
include("checkprofileerror.php");

?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow rounded-4 p-4">
                <form action="" method="post" enctype="multipart/form-data">>
                    <h3 class="mb-3">Update Profile</h3>

                    <input type="text" class="form-control mb-3" name="name" placeholder="Enter New Name">

                    <input type="file" class="form-control mb-3" placeholder="Attach profile_photo" name="profile_pic">

                    <div class="d-grid gap-2 mt-3">

                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>

                        <a href="dashboard.php" class="btn btn-secondary">
                            Back to Dashboard
                        </a>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include("dashboardfooter.php");
include("footer.php");
?>

<?php
include("dashboardfooter.php");
?>