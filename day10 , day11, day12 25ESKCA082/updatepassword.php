<?php

session_start();
include("dashboardheader.php");
include("dashboardverticalcontent.php");
include("checkupdateerror.php");
include("checkloginerror.php");
?>

<div class="container mt-5" style="max-width:400px;";>
    <form action="" method="post">
        <h3 class="mb-3">updatepassword</h3>
            
    
        <input type="password" name="currentpassword"class="form-control mb-3" placeholder="current password" >
        
        <input type="password" name="newpassword" class="form-control mb-3" placeholder="new password">
        <input type="password" name="confirmpassword" class="form-control mb-3" placeholder="confirm new password">

        <button class="btn btn-primary w-100" type="submit">update</button>
        </form>
</div> 
    
    <?php
    include("dashboardfooter.php");
    include("footer.php");
    ?>
