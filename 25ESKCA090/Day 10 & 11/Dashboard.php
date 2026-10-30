<?php
session_start();
include("dashboardheader.php");
include("dashboard_vertical.php");

        /* if(!isset($_SESSION['user_name'])){
        header("location: login.php");
        exit();
        } */
?>
<div class="container-fluid">
    <div class="p-4 mb-4 bg-light rounded shadow-sm text-center">
     <h2 class="mb-0">Welcome, <?php echo $_SESSION['user_name']; ?>!</h2>
    </div>

    <div class="d-flex justify-content-center gap-3">
        <a href="update.php" class="btn btn-primary px-4">Update Password</a>
        <a href="update_profile.php" class="btn btn-primary px-4">Update Profile</a>
    </div>
</div>


<!-- echo "Welcome, ". $_SESSION['user_name']. "!";   

?>

<a href= "update.php">updatePassword</a>    
 -->
    
<?php
include("dashboard_footer.php");
include("footer.php");
?>
