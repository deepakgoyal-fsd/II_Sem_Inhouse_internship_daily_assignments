 <?php
include('dashboardheader.php');
include('dashverticalcontent.php');
?> 


        <h2> <?php echo "Welcome, ".$_SESSION['user_name']. "!";
        ?>
        </h2>
 
<a href="updatepassword.php">Update password</a>

<?php
include('dashboardfooter.php');
include('footer.php');
?>