<?php
include ("dashboardHeader.php");
include("dashboardVerticalContent.php");
?>

    <h2>
         <?php 
         
         echo "Welcome, " . $_SESSION['user_name']. "!"; 
         
         ?> 
        </h2>


<?php
include("dashboardFooter.php");
include ("footer.php");
?>



<?php

include("db_connect1.php");

$id = $_SESSION['user_id'];

$result = mysqli_query($conn,"SELECT * FROM user WHERE id='$id'");
$user = mysqli_fetch_assoc($result);

$image = "default.jpg";

if(!empty($user['profile_image']))
{
    $image = $user['profile_image'];
}
?>


