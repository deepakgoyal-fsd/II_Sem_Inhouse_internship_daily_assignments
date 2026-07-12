<?php
session_start();
 include('dashboardHeader.php');
 if(!isset($_SESSION['user_id']))
    {
    header("Location: login.php");
    exit();
 }
echo "User ID: ".$_SESSION['user_id']."<br>";
echo "welcome,".$_SESSION['user_name']."!";
echo "<br>";
?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
           
<a href="updatePassword.php">Update Password</a>
<br>
<a href="updateProfile.php">Update Profile</a>
</div>
    <div class="col-md-6">
        <h2>
            <?php
            echo "Welcome, ".$_SESSION['user_name']."!";
            echo "<br>";
            ?></h2>
    </div>      
<?php
include("footer.php");
?>