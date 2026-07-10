<?php
include("db_connect.php");

include("dashhead.php");

echo "Welcome, " . htmlspecialchars($_SESSION['user_name'] ?? 'User', ENT_QUOTES, 'UTF-8') . "!";

include("dashboardvertContent.php");
?>

            <h2> <?php echo "welcome," . $_SESSION['user_name'] . "!" ?> </h2>
        
<?php
include("dashboardfooter.php");
include("footer.php");
?>