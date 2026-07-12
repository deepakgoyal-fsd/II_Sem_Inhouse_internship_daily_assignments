<?php
include("dashboardheader.php");
include("dashboardverticalcontent.php");
?>




echo"Welcome, ".$_SESSION['user_name']. "!";
include("dashboardverticalcontent.php");
?>

<h2>
    <?php echo "welcome, ". $_SESSION['user_name']. "!";?></h2>

<?php
include('footer.php');
?>