<?php
include("dashboardHeader.php");
include("header.php");
include("dashboardVertical.php");
?>

    <h2> 
        <?php echo "Welcome, ". $_SESSION ['user_name']."!"?>
</h2>

<?php
include("dashboardFotter.php");
include("footer.php");
?>

