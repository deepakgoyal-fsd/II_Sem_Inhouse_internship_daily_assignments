
<?php
session_start();
include("dashboardHeader.php");
include("db_connect.php");
include("checkUpdateError.php");

?>


<main class="page-shell">
<div class="container">
    <form action="updatePassword.php" method="post" class="form-card">
        <h3 class="mb-3">Update Password</h3>
        <p class="text-secondary mb-4">Keep your account secure with a fresh password.</p>

        <?php if ($error != "") { ?>
            <div class="alert alert-danger py-2"><?=$error?></div>
        <?php } ?>

        <?php if ($success != "") { ?>
            <div class="alert alert-success py-2"><?=$success?></div>
        <?php } ?>

       

        <input type="password" class="form-control mb-3" placeholder="Old Password" name="oldPassword" >

        <input type="password" class="form-control mb-3" placeholder="New Password" name="newPassword" >

        <input type="password" class="form-control mb-3" placeholder="Confirm New Password" name="confirmNewPassword" >

        <button class="btn btn-primary w-100">
            Update
        </button>
        
    </form>
</div>
</main>


<?php
include("dashboardFooter.php");
include ("footer.php");

?>
