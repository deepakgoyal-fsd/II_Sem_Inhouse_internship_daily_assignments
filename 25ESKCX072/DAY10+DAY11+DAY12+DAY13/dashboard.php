<?php


include("dashboardheader.php");
include("dashboardVerticalContent.php");
?>


<h4 class="text-secondary fw-bold mb-1">
    Welcome, <?php echo isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest'; ?>!
</h4>


<?php
include("dashboardFooter.php");
include("footer.php");
?>