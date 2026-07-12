<?php 

include ('dashboardHeader.php');


 

?>

<?php include ('dashboardVertical.php'); ?>


 
 <div class ="container-fluid">
    <div class = "row">
       

            <div class = "col-md-9">
                <h2> <?php echo "Welcome, " . $_SESSION['user_name'] . "!"; ?></h2>
            </div>
        </div>
    
    </div>
  

<?php


include('footer.php');
?>