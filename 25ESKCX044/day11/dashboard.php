<?php 


include ('dashboardHeader.php');

?>

<?php
include('dashboardVertical.php');
?>
<center>

<div class ="container-fluid">

<div class = "row">

 <div class = "col-md-9">

 <h2> <?php echo "Welcome, " . $_SESSION['user_name'] . "!"; ?></h2>

 </div>

 </div>
 
 <img src="Profil.jpg" height="150" width="150" alt="Profile Picture">
 

 </div>
 
 </center>
