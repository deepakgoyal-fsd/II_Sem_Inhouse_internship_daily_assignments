<?php
session_start();
include("dashboardHeader.php");
include ("db_connect.php");
include("checkUpdatePassword.php");
include("dashboardOptions.php");
?>
<div class="container mt-4" style="max-width:400px;">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            
            <?php if (!empty($message)): ?>
            <div class="alert alert-success text-center"><?php echo $message; ?></div>
            <?php endif; ?>

            <?php if (!empty($error)): ?>
            <div class="alert alert-danger text-center"><?php echo $error; ?></div>
            <?php endif; ?>

            <form action="" method="post">
                <h3 class="mb-4 text-center">Update Password</h3>
                
                <input type="password" name="oldpassword" class="form-control mb-3 bg-light" placeholder="Old Password">
                <input type="password" name="newpassword" class="form-control mb-3 bg-light" placeholder="New Password">
                <input type="password" name="confirmpassword" class="form-control mb-4 bg-light" placeholder="Confirm Password">
                
                <button class="btn btn-primary w-100">Update</button>
            </form>
        </div>
    </div>
</div>  
<?php 
include ("dashboardfooter.php");
include("footer.php");
?>