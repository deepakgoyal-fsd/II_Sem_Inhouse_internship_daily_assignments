<?php
 include("dashboardheader.php");
 session_start();
 echo"welcome, ".$_SESSION['user_name']."!";
 ?>
 <a href="updatepassword.php">update password</a>

 <?php
 include("footerday10.php");

 ?>
 
