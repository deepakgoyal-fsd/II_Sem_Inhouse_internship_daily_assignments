<?php
include("dashboardHeader.php");
include("dashboardVerticalContent.php");

session_start();

if(!isset($_SESSION['user_name'])){
    header("location: login.php");
    exit();
}


?>



<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <a href="updatePassword.php">Update Password</a>
            <a href="updateProfile.php">Update Profile</a>
        </div>
    </div>
</div>

<div class="col-md-9">
    <h2><?php echo "Welcome, ".$_SESSION['user_name']. "|"; ?></h2>
</div>





<?php
include("dashboardfooter.php");
include("footer.php");

?>