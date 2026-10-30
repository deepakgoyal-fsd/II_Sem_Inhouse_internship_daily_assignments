<?php
session_start();
include("dashboardheader.php");
include("dashboardVerticalContent.php");
?>
<?php

include ("db_connect.php");
include("checkUpdateError.php")
?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Update Password</h3>
        
        <input type="password"  name= "oldpassword"class="form-control mb-3" placeholder="Old Password" >
         <input type="password" name="newpassword" class="form-control mb-3" placeholder="New Password" >
         <input type="password" name="confirmpassword" class="form-control mb-3" placeholder="Confirm Password" >
        <button class="btn btn-primary w-100">Update</button>
</form>
</div>  


<?php
include("dashboardFooter.php");
include("footer.php");
?>