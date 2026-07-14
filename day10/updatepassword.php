<?php
session start();
include ("dashboardheader.php");
include("dashboardVertical.php");
include("checkupdateError.php");
?>
<div class="container mt-5" style="max-width:440px;">
 <form action="" method="post">
        <h3 class="mb-3">Update Password</h3>

        <input type="password" class="form-control mb-3"name="oldPassword" placeholder="Old Password">
         <input type="password" class="form-control mb-3"name="newPassword" placeholder="New Password">
       
          <input type="password" class="form-control mb-3"name="confirmPassword" placeholder="confirm Password">
       
       
    

        <button class="btn btn-primary w-100">Update</button>
</form>
</div>

<?php
include("dashboardFooter.php");
include("footer.php");
?>