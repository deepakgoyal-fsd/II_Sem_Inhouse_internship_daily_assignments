<?php

include("dashboardheader.php");
include("dashboardVerticleColumn.php");

?>

<div class ="container-fluid">
    <div class="row">
        <div class="col-md-3">

        <a href="updatePassword.php">Update Password</a>
        <br>
        <a href="updateProfile">Update Profile</a>
        </div>
    <div class="col-md-9">
        <h2>
            <?php echo "welcome, ". $_SESSION
            ['user_name']. "!";
            ?>
        </h2>

    </div>
    </div>
</div>
<?php
include("footer.php");
?>