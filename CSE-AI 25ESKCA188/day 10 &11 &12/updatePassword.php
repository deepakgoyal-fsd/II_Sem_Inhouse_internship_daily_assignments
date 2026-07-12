<?php
session_start();
include("db-connect.php");
include("dashboardheader.php");
include("dashboardverticalcontent.php");
include("checkupdateerror.php");
?>



<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card shadow rounded-4 p-4">
                <form action="" method="post">
                    <h3 class="mb-3">Update Password</h3>

                    <input type="password" class="form-control mb-3" name="oldpassword" placeholder="Old Password">

                    <input type="password" class="form-control mb-3" placeholder="New Password" name="newpassword">
                    <input type="password" class="form-control mb-3" placeholder="Confirm Password" name="confirmpassword">

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