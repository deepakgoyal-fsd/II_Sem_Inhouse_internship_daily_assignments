<?php
include("header.php");
include("db_connect.php");
include("checkloginerror.php");

$email ="";
$password ="";


?>



<div class="container mt-5" style="max-width:800px">
    <div class="row justify-content-center">
        <div class="col-md-5">
    <form action="" method = "post">
        <h3 class="mb-3">Login</h3>
        <input type="email" class="form-control mb-3" name="email" placeholder="Enter your Email">
        <input type="password" class="form-control mb-3" name="password" placeholder="Enter your password">




<button type="submit" class="btn btn-primary w-100">Login</button> 
        
</form>
            
</div>
</div>
</div>


<?php
  include ('footer.php');
  ?>
