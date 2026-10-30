<?php
include("database2.php");
include("dashboardheader.php");
include("dashboard_vertical.php");
?>

<div class="container mt-5" style="max-width:400px; ">
    <form action="update_success.php" method="post">
        <h3 class="mb-3">Update Profile</h3>

        <input type="text" name = "name" class="form-control mb-3" placeholder = "Change Username">
        <input type="email" name = "email" class="form-control mb-3" placeholder = "New E-mail" >
        

        <btn type = "Submit" button class="btn btn-primary w-100" onclick="window.location.href='update_profile.php'">UPDATE</button>
    </form>

    <link rel = "stylesheet"  href = "success_up.php">
</div>

<?php
include("dashboard_footer.php");
include("footer.php");
?>
