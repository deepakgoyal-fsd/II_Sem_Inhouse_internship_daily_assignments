<?php

include("dashheader.php");
include('dashcontent.php');
   
?>

     <h2 >
        <?php echo "Welcome, ". $_SESSION['user_name']. "! this is your dashboard";  
        ?>
     </h2>  
    
<?php

include("dashfooter.php");
include("fotter.php");

?>


<!-- echo "Welcome, ". $_SESSION['user_name']. "!";   

?>

<a href= "updatePassword.php">updatePassword</a>    
 -->
