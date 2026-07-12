<?php

include("dashheader.php");
include("dashcontent.php");

?>

<div class="container mt-5" style="max-width:400px; ">
    <form action="checkupdate.php" method="post">
        <h3 class="mb-3">Update Password</h3>

         <input type="password" name = "oldpassword" class="form-control mb-3" placeholder = "OldPassword">
        <input type="password" name = "newpassword" class="form-control mb-3" placeholder = "NewPassword" >
        <input type="password" name = "confirmpassword" class="form-control mb-3" placeholder = "Confirm Password" >
        

        <button type = "submit" class="btn btn-primary w-100" >Update</button>
    </form>
</div>

<?php
include('dashfooter.php');
include('fotter.php');
?>
