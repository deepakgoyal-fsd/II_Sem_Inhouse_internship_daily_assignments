<?php
session_start();
if(!isset($_SESSION['user_name'])){ 
     header("Location: login.php"); 
        exit();
 }

include ("dashboardheader.php");
include("dashboardVertical.php");
?>


       <h2>
        
         <?php echo "Welcome, ". $_SESSION['user_name']. "!";
  ?>
</h2>

<?php
include("dashboardFooter.php");
include("footer.php");
?>