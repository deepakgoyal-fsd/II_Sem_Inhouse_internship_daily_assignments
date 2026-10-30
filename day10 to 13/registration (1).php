<?php
include ("db_connect.php");
include("checkRegistration.php");
include ("header.php");
?>

<div class="container mt-5" style="max-width:400px;">
    <form action="" method="post">
        <h3 class="mb-3">Register</h3>
        <input type="text"  name ="name"class="form-control mb-3" placeholder="name" value="<?=$name?>">
        <input type="email"  name= "email"class="form-control mb-3" placeholder="email" value="<?=$email?>">
         <input type="password" name="password" class="form-control mb-3" placeholder="Password" value="<?=$password?>">
        <input type="password" name="ConfirmPassword"  class="form-control mb-3" placeholder=" ConfirmPassword" value="<?=$ConfirmPassword?>">
        <button class="btn btn-primary w-100">Register</button>
</form>
</div>

<?<php
include("footer.php");
?>