<?php 
   
   include ('header.php');
   include ('checkLogin.php');
   ?>




<div class="container mt-5" style="max-width:500px;" >
<form action="" method="post">
<h3 class="mb-3">Login</h3>


<input type="email" class="form-control mb-3"  name="email" placeholder="Enter your Email">

<input type="password" class="form-control mb-3" name="password" placeholder="Enter your password">




<button class="btn btn-primary w-100">Login</button> 
        
</form>
            
</div>


<?php
  include ('footer.php');
  ?>