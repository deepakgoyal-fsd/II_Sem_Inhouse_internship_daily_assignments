<?php

session_start();
include("dashboardHeader.php");
include("dashboardVerticalContent.php");
include("checkUpdateError.php");

?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">

        <h3 class="mb-3">Update</h3>

        <input type="password" class="form-control mb-3" placeholder="Old Password" name="oldPassword">

        <input type="password" class="form-control mb-3" placeholder="New Password" name="newPassword">

        <input type="password" class="form-control mb-3" placeholder="Confirm Password" name="confirmPassword">

        <button type="submit" class="btn btn-primary w-100">Update</button>

    </form>
</div>

<?php

include("dashboardfooter.php");
include("footer.php");

?>