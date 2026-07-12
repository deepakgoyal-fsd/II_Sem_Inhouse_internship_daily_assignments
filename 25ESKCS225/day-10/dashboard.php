<?php
session_start();
include("dashboardHeader.php");
include("dashboardVerticalContent.php");

$name = $_SESSION["user_name"] ?? "hello";
echo "Welcome " . $name . "!";

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <a href="updatePassword.php">Update Password</a>
            <br>
            <a href="updateProfile.php">Update Profile</a>
        </div>
        <div class="col-md-9">
            <h2> <?php echo "Welcome, " . $_SESSION["user_name"]; ?> </h2>
        </div>
    </div>
</div>

<?php
include("dashboardFooter.php");
include("footer.php");
?>