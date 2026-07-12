<?php

include("header.php");
include("db_connect.php");
include("checkLoginError.php");
?>
<div class="container mt-5" style="max-width:400px;">
    <form action="" method="POST">
        <h3 class="mb-3">Login</h3>
        <!-- <input type="text" name="name" class="form-control mb-3" placeholder="name" value="<?=$name?>"> -->
        <input type="email" name="email" class="form-control mb-3" placeholder="email" value="<?=$email?>">
        <input type="password" name="password" class="form-control mb-3" placeholder="password" value="<?=$password?>">
        
        <!-- <input type="password" name="confirmpassword" class="form-control mb-3" placeholder="confirm password" vlaue="<?=$confirmpassword?>"> -->
        <input type="submit" class="btn btn-primary w-100" value="Login">
</form>
</div>


<?php
include("footer.php");
?>
