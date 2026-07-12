<?php 
session_start();
include("DBconnect.php ");
include("dashboardheader.php");
include("dashboardverticalcontent.php");
?>
<div class="container mt-5" style="max-width:400px;";>
    <form action="" method="post">
        <h3 class="mb-3">update profile</h3>
            
    
        <input type="text" class="form-control mb-3" name="name" placeholder="name" value="<?=$_SESSION["user_name"]?>">
        
        <input type="file" name="file">
    

        <button class="btn btn-primary w-100" type="submit">update</button>
        </form>
</div>
<?php

include("dashboardfooter.php");
include("footer.php");
?>