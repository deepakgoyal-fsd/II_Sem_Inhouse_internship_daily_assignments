<?php
include("db_connect.php");
include("dashboardHeader.php");
include("dashboardVerticalContent.php");
?>


<?php

session_start();
include("dashboardHeader.php");
include("dashboardVerticalContent.php");
include("checkUpdateError.php");

?>

<form>

<?php
include("header.php");
include("db_connect.php");
include("checkLoginError.php");
?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Update Profile</h3>

        <input type="Text" class="form-control mb-3" name="Name" 
               placeholder="name" value="<?=$_SESSION["user_name"] ?>">

        <input type="file" name="file" 
              <button class="btn btn-primary w-100">Update</button>


        <button type="submit" name="update" class="btn btn-primary w-100">Update</button>
    </form>
</div>

</form>

<?php
include("dashboardFooter.php");
include ("footer.php");
?>


