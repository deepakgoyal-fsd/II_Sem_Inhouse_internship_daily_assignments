<?phpinclude("db_connect.php");
include("dashboardheader.php");
include("dashboardVerticalContent.php");
?>
<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Update Profile</h3>
        
        <input type="text"  name= "name "class="form-control mb-3" placeholder="Name" value="<?=$_SESSION["user_name"]?>" >
         <input type="file" name="file" >
        <button class="btn btn-primary w-100">Update</button>
</form>
</div>  

<?php

include("dashboardfooter.php");
include("footer.php");
?>
