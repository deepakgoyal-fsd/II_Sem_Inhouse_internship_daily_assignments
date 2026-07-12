<?php

include("checkUpdateError.php");
include("dashboardheader.php");
include("dashboardverticalcontent.php");
?>

    <div class="container mt-5" style="max-width:400px;">
    <form action="" method="POST">
        <h3 class="mb-3">Update password</h3>
       <input type="password" name="oldPassword" class="form-control mb-3" placeholder="old password" >
        <input type="password" name="newPassword" class="form-control mb-3" placeholder="new password" >
        <input type="password" name="confirmPassword" class="form-control mb-3" placeholder="confirm password" >
       
        <input type="submit" class="btn btn-primary w-100" value="Update">
</form>
</div>

<?php
include("dashboardfooter.php");
include("footer.php");
?>