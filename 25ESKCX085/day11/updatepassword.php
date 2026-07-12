<?php

session_start();
include("dashboardheader.php");
include("db_connect.php");
include("checkupdateerror.php");


?>

<div class ="container mt-5" style="max>-width:400px;">
<form action="" method = "post">
    <h3 class="mb-3">Update Password</h3>


    <input type="password" name ="oldpassword" class="form-control
    mb-3" placeholder="old password" >

    <input type="password" name="newpassword"
    class="form-control mb-3"
    placeholder="new password" >

    <input type="password" name="confirmpassword"
    class="form-control mb-3"
    placeholder="confirm  password" >

    <button type="submit">
UPDATE
</button>
</form>
</div>

<?php
 include("footer.php");
?>