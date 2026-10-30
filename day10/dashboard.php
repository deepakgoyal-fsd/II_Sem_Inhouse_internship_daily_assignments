<?php


include("dashboardheader.php");
include("dashboardvertical.php");
?>

<h2>
    Welcome, <?php echo $_SESSION['user_name']; ?>!
</h2>

<?php
include("dashboardfooter.php");
include("footer.php");
?>