<?php

include("dashboardheader.php");
include("dashboardvertical.php");




?>
<?php
include ("header.php");
include ("db_connect.php");
include ("checkLoginError.php");
?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method = "post">
        <h3 class="mb-3">updatepassword</h3>

        <input type="password" class="form-control mb-3" placeholder="password" name="password">

        <input type="newpassword" class="form-control mb-3" placeholder="newPassword" name="newpassword" >

        <input type="confirmpassword" class="form-control mb-3" placeholder="confirmPassword" name="confirmpassword" >

        


        <button class="btn btn-primary w-100">Login</button>
    </form>
</div>




<?php 
include("dashboardfooter.php");
include ("footer.php"); ?>

<form>
</form>
