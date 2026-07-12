<?php

session_start();
include("dashboardheader.php");
include("db_connect.php");
include("checkupdateerror.php");
include("dashboardverticalcontant.php");


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
    <h6>Password Requirment : </h6>
        <p>It must contain at least one uppercase</p>
        <p>It must contain at least one special charater(!@#$%^&*)</p>
        <p>It must contain at least one number(1234567890)</p>
        <p>It must contain at least one lowercase</p>
        <p>It must contain at least 8 charater</p>

    <button type="submit">
UPDATE
</button>
</form>
</div>

<?php 
include("dashboardfooter.php");
include("footer.php");

?>