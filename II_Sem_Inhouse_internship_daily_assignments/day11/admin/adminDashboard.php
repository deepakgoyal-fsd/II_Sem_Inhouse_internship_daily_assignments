<?php
include ('dashboardHeader.php');
include ('dashboardVertical.php');
include('db_connect.php');
?>

<div class ="container-fluid">

<div class = "row">

 <div class = "col-md-9">

 <h2> Admin Dashboard <br><?php echo "Welcome, " . $_SESSION['user_name'] . "!"; ?></h2>

 </div>

 </div>

 </div>

<?php

  $selectQuery = "SELECT * FROM user";
  $result = mysqli_query($conn, $selectQuery);
  $user = mysqli_fetch_all($result, MYSQLI_ASSOC);

  if($user){
    
      echo "<h3>List of Users:</h3>";
      echo "<ul>";
      foreach($user as $user){
          echo "<li>" . $user['name'] . " - " . $user['email'] . "</li>";
      }
      echo "</ul>";
  } else {
      echo "No users found.";
  }
  ?>

 <?php
 include ('footer.php');
 ?>