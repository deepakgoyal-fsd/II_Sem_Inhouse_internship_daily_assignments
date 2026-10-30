<?php
session_start();
include("dashboardheader.php");
include("dashboardVerticalContent.php");
if(!isset($_SESSION['user_name'])){
    header("Location: login.php");
    exit();
}



?>

<h2>
     <?php echo "Welcome, " . $_SESSION['user_name']. "!";
            ?>
            </h2>


<?php
include("dashboardFooter.php");
include("footer.php");
?>
