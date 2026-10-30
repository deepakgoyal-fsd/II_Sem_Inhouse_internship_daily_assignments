<?php
session_start();
include("dashboardheader.php");
include("dashboard_vertical.php");
include("Check_update.php");

?>

<div class="container mt-5" style="max-width:400px; ">
    <form action="update_success.php" method="post">
        <h3 class="mb-3">Update Password</h3>

        <input type="password" name = "oldpassword" class="form-control mb-3" placeholder = "Old Password">
        <input type="password" name = "newpassword" class="form-control mb-3" placeholder = "New Password" >
        <input type="password" name = "confirmpassword" class="form-control mb-3" placeholder = "Confirm Password" >
        

        <button class="btn btn-primary w-100" onclick="window.location.href='update.php'">Update</button>
    </form>
</div>

<?php
include("dashboard_footer.php");
include("footer.php");
?>
