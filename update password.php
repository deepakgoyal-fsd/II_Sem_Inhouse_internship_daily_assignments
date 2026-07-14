<?php
include("db_connect.php");
include("dashboardHeader.php");
include("dashboardVerticalContent.php");
?>
<?php

session_start();
include("dashboardHeader.php");
include("dashboardVerticalContent.php");
include("checkUpdatePassword.php");

?>


<form>

<?php
include("header.php");
//include("db_connect.php");
//include("checkLoginError.php");
?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Login</h3>

        <input type="email" class="form-control mb-3" name="oldPassword" 
               placeholder="oldPassword" value="<?= isset($oldPassword) ? $oldPassword : '' ?>">

        <input type="password" class="form-control mb-3" name="newPassword" 
               placeholder="newPassword" value="<?= isset($newPassword) ? $newPassword : '' ?>">

               <input type="password" class="form-control mb-3" name="confirmPassword" 
               placeholder="confirmPassword" value="<?= isset($confirmPassword) ? $confirmPassword : '' ?>">


        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
    </form>
</div>

<?php
include("footer.php");
?>

</form>

<?php
include("dashboardFooter.php");
include("footer.php");